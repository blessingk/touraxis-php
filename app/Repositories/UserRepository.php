<?php

namespace App\Repositories;

use App\Contracts\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @return Collection
     */
    public function getAllUsers(): Collection
    {
        return User::all();
    }

    /**
     * @param array $user
     * @return Model
     */
    public function createUser(array $user): Model
    {
        return User::query()->create($user);
    }

    /**
     * @param User $user
     * @param array $data
     * @return bool
     */
    public function updateUser(User $user, array $data): bool
    {
        return $user->update($data);
    }

    /**
     * @param User $user
     * @return bool
     */
    public function deleteUser(User $user): bool
    {
        return $user->delete();
    }
}
