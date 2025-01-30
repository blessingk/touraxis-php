<?php

namespace App\Contracts;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    public function getAllUsers(): Collection;

    public function createUser(array $user): Model;

    public function updateUser(User $user, array $data): bool;

    public function deleteUser(User $user): bool;

}
