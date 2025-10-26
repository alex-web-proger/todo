<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class EloquentUserRepository implements UserRepositoryInterface
{

    public function paginate(int $perPage): LengthAwarePaginator
    {
        return User::paginate($perPage);
    }

    public function find(int $id): User
    {
        return User::findOrFail($id);
    }

    public function create(array $data): User
    {
        return User::create($data);
    }

    public function update(int $id, array $data): User
    {
        $user = $this->find($id);
        $user->update($data);

        return $user;
    }

    public function delete(int $id): void
    {
        $user = $this->find($id);
        $user->delete();
    }
}
