<?php
declare(strict_types = 1);

namespace App\Repositories\Payment;

use App\DataTransferObjects\Payment;
use App\Models\Payment\PaymentInterface;
use App\Repositories\BaseRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Interface PaymentRepositoryInterface
 *
 * @author D3lph1 <d3lph1.contact@gmail.com>
 * @package App\Repositories\Payment
 */
interface PaymentRepositoryInterface extends BaseRepositoryInterface
{
    public function create(PaymentInterface $entity): PaymentInterface;

    public function find(int $id, array $columns): ?PaymentInterface;

    /**
     * Receives completed payments created within one year from this moment.
     */
    public function forTheLastYearCompleted(array $columns): iterable;

    public function profit(): float;

    public function complete(int $id, string $serviceName): bool;

    public function historyForUser(int $userId, array $columns): LengthAwarePaginator;

    public function withUserPaginated(array $paymentColumns, array $userColumns): LengthAwarePaginator;

    public function delete(int $id): bool;

    public function deleteByUserId(int $userId): bool;
}
