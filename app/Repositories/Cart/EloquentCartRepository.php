<?php
declare(strict_types=1);

namespace App\Repositories\Cart;

use App\DataTransferObjects\Cart;
use App\Models\Cart\CartInterface;
use App\Models\Cart\EloquentCart;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class EloquentCartRepository
 *
 * @author  D3lph1 <d3lph1.contact@gmail.com>
 * @package App\Repositories\Cart
 */
class EloquentCartRepository implements CartRepositoryInterface
{
    public function create(CartInterface $entity): CartInterface
    {
        return EloquentCart::create([
            'server' => $entity->getServerId(),
            'player' => $entity->getPlayer(),
            'type' => $entity->getType(),
            'item' => $entity->getItem(),
            'amount' => $entity->getAmount(),
            'extra' => $entity->getExtra(),
            'item_id' => $entity->getItemId()
        ]);
    }

    public function insert(array $attributes): bool
    {
        return EloquentCart::insert($attributes);
    }

    public function historyForUser($userLogin, ?int $server, array $cartColumns, array $itemColumns): LengthAwarePaginator
    {
        if ($server) {
            $builder = EloquentCart::join('items', 'items.id', 'cart.item_id')
                ->where('cart.server', $server);
        } else {
            $builder = EloquentCart::join('items', 'items.id', 'cart.item_id');
        }

        return $builder
            ->select(array_merge($cartColumns, ['item_id']))
            ->where('cart.player', $userLogin)
            ->orderBy('cart.created_at', 'DESC')
            ->with([
                'item_' => function ($query) use ($itemColumns) {
                    /** @var Builder $query */
                    $query->select(array_merge($itemColumns, ['id']));
                }
            ])
            ->paginate(s_get('profile.cart_items_per_page', 10));
    }

    public function getByPlayerWithItems(string $player, array $cartColumns, array $itemColumns): iterable
    {
        return EloquentCart::select(array_merge($cartColumns, ['item_id']))
            ->with([
                'item_' => function ($query) use ($itemColumns) {
                    /** @var Builder $query */
                    $query->select(array_merge($itemColumns, ['id']));
                }
            ])
            ->where('player', $player)
            ->get();
    }

    public function all(): iterable
    {
        return EloquentCart::all();
    }

    public function truncate(): void
    {
        EloquentCart::truncate();
    }
}
