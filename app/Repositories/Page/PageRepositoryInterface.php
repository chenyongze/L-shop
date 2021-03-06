<?php
declare(strict_types = 1);

namespace App\Repositories\Page;

use App\Models\Page\PageInterface;
use App\Repositories\BaseRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Interface PageRepositoryInterface
 *
 * @author D3lph1 <d3lph1.contact@gmail.com>
 * @package App\Repositories\Page
 */
interface PageRepositoryInterface extends BaseRepositoryInterface
{
    public function create(PageInterface $entity): PageInterface;

    public function update(int $id, PageInterface $entity): bool;

    public function paginated(): LengthAwarePaginator;

    public function find(int $id, array $columns): ?PageInterface;

    public function findByUrl(string $url, array $columns): ?PageInterface;

    public function getPaginated(array $columns): LengthAwarePaginator;

    public function isUrlUnique(int $pageId, string $url): bool;

    public function isUrlUniqueAll(string $url): bool;

    public function delete(int $id): bool;
}
