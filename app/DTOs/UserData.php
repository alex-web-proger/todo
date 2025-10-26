<?php

namespace App\DTOs;

use App\Http\Requests\StoreUserRequest;

class UserData
{
    public function __construct(
        public readonly ?string $name,
        public readonly ?string $email,
        public readonly ?string $password
    )
    {
    }

    public static function fromStoreRequest(StoreUserRequest $request): self
    {
        $data = $request->validate();

        return new self(
            name: $data['name'],
            email: $data['email'],
            password: $data['password']
        );
    }

    public static function fromUpdateRequest(StoreUserRequest $request): self
    {
        $data = $request->validate();

        return new self(
            name: $data['name'] ?? null,
            email: $data['email'] ?? null,
            password: $data['password'] ?? null
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password
        ], fn($value) => $value !== null);
    }
}
