<?php
declare(strict_types = 1);

namespace App\Repositories\Product;

use App\Models\Product\EloquentProduct;
use App\Models\Product\ProductInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class EloquentProductRepository
 *
 * @author  D3lph1 <d3lph1.contact@gmail.com>
 * @package App\Repositories\Product
 */
class EloquentProductRepository implements ProductRepositoryInterface
{
    public function create(ProductInterface $entity): ProductInterface
    {
        return EloquentProduct::create(trim_nullable([
            'id' => $entity->getId(),
            'price' => $entity->getPrice(),
            'item_id' => $entity->getItemId(),
            'server_id' => $entity->getServerId(),
            'stack' => $entity->getStack(),
            'category_id' => $entity->getCategoryId(),
            'sort_priority' => $entity->getSortPriority()
        ]));
    }

    public function update(int $productId, ProductInterface $entity): bool
    {
        return (bool)EloquentProduct::where('id', $productId)
            ->update([
                'price' => $entity->getPrice(),
                'item_id' => $entity->getItemId(),
                'server_id' => $entity->getServerId(),
                'stack' => $entity->getStack(),
                'category_id' => $entity->getCategoryId(),
                'sort_priority' => $entity->getSortPriority(),
            ]);
    }

    public function exists(int $id): bool
    {
        return EloquentProduct::where('id', $id)->exists();
    }

    public function withItems(int $id, array $productColumns, array $itemColumns): ?ProductInterface
    {
        return EloquentProduct::select($this->mergeProductColumns($productColumns))
            ->where('id', $id)
            ->with([
                'item_' => function ($query) use ($itemColumns) {
                    /** @var Builder $query */
                    $query->select($this->mergeItemColumns($itemColumns));
                }
            ])
            ->first();
    }

    public function withItemsMultiple(array $id, array $productColumns, array $itemColumns): iterable
    {
        return EloquentProduct::select($this->mergeProductColumns($productColumns))
            ->whereIn('id', $id)
            ->with([
                'item_' => function ($query) use ($itemColumns) {
                    /** @var Builder $query */
                    $query->select($this->mergeItemColumns($itemColumns));
                }
            ])
            ->get();
    }

    public function forCatalog(int $serverId, int $category, array $productColumns, array $itemColumns): LengthAwarePaginator
    {
        $orderBy = s_get('shop.sort');

        if ($orderBy === 'name_desc') {
            $orderField = 'items.name';
            $orderDirection = 'DESC';
        } else if ($orderBy === 'priority') {
            $orderField = 'products.sort_priority';
            $orderDirection = 'ASC';
        } else if ($orderBy === 'priority_desc') {
            $orderField = 'products.sort_priority';
            $orderDirection = 'DESC';
        } else {
            $orderField = 'items.name';
            $orderDirection = 'ASC';
        }

        return EloquentProduct::select($this->mergeProductColumns($productColumns))
            ->join('items', 'items.id', '=', 'products.item_id')
            ->where('server_id', $serverId)
            ->where('category_id', $category)
            ->orderBy($orderField, $orderDirection)
            ->with([
                'item_' => function ($query) use ($itemColumns) {
                    /** @var Builder $query */
                    $query->select($this->mergeItemColumns($itemColumns));
                }])
            ->paginate(s_get('catalog.products_per_page', 10));
    }

    public function withCategoryWithServerPaginated(
        array $productColumns,
        array $temColumns,
        array $categoryColumns,
        array $serverColumns,
        string $orderBy = 'products.id',
        string $orderType = 'ASC',
        ?string $filter = null): LengthAwarePaginator
    {
        $builder = EloquentProduct::select(array_merge($this->mergeProductColumns($productColumns), ['category_id']))
            ->join('items', 'items.id', 'products.item_id')
            ->join('servers', 'servers.id', 'products.server_id')
            ->join('categories', 'categories.id', 'products.category_id')
            ->orderBy($orderBy, $orderType)
            ->with([
                'item_' => function ($query) use ($temColumns) {
                    /** @var Builder $query */
                    $query->select($this->mergeItemColumns($temColumns));
                },
                'category' => function ($query) use ($categoryColumns, $serverColumns) {
                    /** @var Builder $query */
                    $query->select(array_merge($categoryColumns, ['id', 'server_id']))
                        ->with([
                            'server' => function ($query) use ($serverColumns) {
                                /** @var Builder $query */
                                $query->select(array_merge($serverColumns, ['id']));
                            }
                        ]);
                }
            ]);

        if (!is_null($filter)) {
            $builder->where('items.name', 'like', $filter . '%');
        }

        return $builder->paginate(50);
    }

    public function delete(int $productId): bool
    {
        return (bool)EloquentProduct::where('id', $productId)->delete();
    }

    public function deleteByItemId(int $itemId): bool
    {
        return (bool)EloquentProduct::where('item_id', $itemId)->delete();
    }

    public function deleteByServer(int $serverId): bool
    {
        return (bool)EloquentProduct::where('server_id', $serverId)->delete();
    }

    public function deleteByCategory(int $categoryId): bool
    {
        return (bool)EloquentProduct::where('category_id', $categoryId)->delete();
    }

    private function mergeProductColumns(array $columns): array
    {
        return array_merge($columns, ['products.item_id']);
    }

    private function mergeItemColumns(array $columns): array
    {
        return array_merge($columns, ['items.id']);
    }

    public function truncate(): void
    {
        EloquentProduct::truncate();
    }
}
