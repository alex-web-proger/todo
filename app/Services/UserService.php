<?php
declare(strict_types=1);

namespace App\Services;

use App\DTOs\UserData;
use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;


class UserService
{
    protected UserRepositoryInterface $users;

    public function __construct(UserRepositoryInterface $users)
    {
        $this->users = $users;
    }

    public function list(int $perPage): LengthAwarePaginator
    {
        return $this->users->paginate($perPage);
    }

    public function find(int $id): User
    {
        return $this->users->find($id);
    }

    public function create(UserData $data): User
    {
        $payload = $data->toArray();

        if (isset($payload['password'])) {
            $payload['password'] = Hash::make($payload['password']);
        }

        return $this->users->create($payload);
    }

    public function update(int $id, UserData $data): User
    {
        $payload = $data->toArray();

        if (isset($payload['password'])) {
            $payload['password'] = Hash::make($payload['password']);
        }

        return $this->users->update($id, $payload);
    }

    public function delete(int $id): void
    {
        $this->users->delete($id);
    }
}
