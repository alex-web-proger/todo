<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface UserRepositoryInterface
{
    public function paginate(int $perPage): LengthAwarePaginator;

    public function find(int $id): User;

    public function create(array $data): User;

    public function update(int $id, array $data): User;

    public function delete(int $id): void;
}
