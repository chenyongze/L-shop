<?php
declare(strict_types = 1);

namespace App\Models\User;

use App\Services\User\Permissions\Permissions;
use App\Services\User\Roles;
use Cartalyst\Sentinel\Users\UserInterface as BaseUserInterface;

/**
 * Interface UserInterface
 *
 * @author  D3lph1 <d3lph1.contact@gmail.com>
 * @package App\Models\User
 */
interface UserInterface extends BaseUserInterface
{
    public function getActivations(): iterable;

    public function getRoles(): iterable;

    public function getRolesManager(): Roles;

    public function getPermissionsManager(): Permissions;



    public function getId(): int;

    public function setUsername(string $username): UserInterface;

    public function getUsername(): string;

    public function setEmail(string $email): UserInterface;

    public function getEmail(): string;

    public function setPassword(string $password): UserInterface;

    public function getPassword(): string;

    public function setBalance(float $value): UserInterface;

    public function getBalance(): float;

    public function getPermissions(): ?array;
}
