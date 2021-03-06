<?php
declare(strict_types = 1);

namespace App\Exceptions\User;

use App\Exceptions\RuntimeException;

/**
 * Class UnableToCompleteRemindException
 * An exception is intended for cases when, for some reason, you can not complete the password recovery.
 *
 * @author  D3lph1 <d3lph1.contact@gmail.com>
 * @package App\Exceptions\User
 */
class UnableToCompleteRemindException extends RuntimeException
{
    //
}
