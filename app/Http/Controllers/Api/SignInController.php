<?php
declare(strict_types = 1);

namespace App\Http\Controllers\Api;

use App\Exceptions\User\BannedException;
use App\Models\User\UserInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Class SignInController
 *
 * @author D3lph1 <d3lph1.contact@gmail.com>
 * @package App\Http\Controllers\Api
 */
class SignInController extends ApiController
{
    /**
     * Authenticate user by request to API.
     */
    public function signin(Request $request): RedirectResponse
    {
        if (is_auth() or !$this->isEnabled('signin')) {
            return $this->redirectToSignin();
        }

        // From request
        $username = $request->get('username');
        $hash = $request->get('hash');

        // If request params is empty
        if (!$username or !$hash) {
            return $this->redirectToSignin();
        }

        if (!$this->validateHash($hash, $username)) {
            return $this->redirectToSignin();
        }

        /** @var UserInterface $user */
        $user = $this->sentinel->getUserRepository()->findByCredentials([
            'username' => $username
        ]);

        // If user with given username not found.
        if (is_null($user)) {
            return $this->redirectToSignin();
        }

        if (access_mode_guest() and !$user->getPermissionsManager()->hasAccess(['user.admin'])) {
            return $this->redirectToServers();
        }

        try {
            if ($this->sentinel->authenticate($user, (bool)s_get('api.signin.remember_user'))) {
                $this->msg->success(__('messages.auth.signin.welcome', ['username' => $username]));

                return $this->redirectToServers();
            }
        } catch (BannedException $e) {
            $this->msg->danger(build_ban_message($e->getUntil(), $e->getReason()));

            return $this->redirectToServers();
        }

        return $this->redirectToSignin();
    }

    private function redirectToServers(): RedirectResponse
    {
        return response()->redirectToRoute('servers');
    }

    private function redirectToSignin(): RedirectResponse
    {
        return response()->redirectTo('signin');
    }
}
