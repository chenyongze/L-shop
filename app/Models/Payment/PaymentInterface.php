<?php
declare(strict_types = 1);

namespace App\Models\Payment;

use App\Models\User\UserInterface;
use Carbon\Carbon;

/**
 * Interface PaymentInterface
 *
 * @author  D3lph1 <d3lph1.contact@gmail.com>
 * @package App\Models\Payment
 */
interface PaymentInterface
{
    public function getUser(): UserInterface;


    public function getId(): int;

    public function getService(): ?string;

    public function getProducts(): ?array;

    public function getCost(): float;

    public function getUserId(): ?int;

    public function getUsername(): ?string;

    public function getServerId(): int;

    public function isCompleted(): bool;

    public function getCreatedAt(): Carbon;

    public function getUpdatedAt(): ?Carbon;
}