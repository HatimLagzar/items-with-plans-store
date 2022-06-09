<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\AbstractEloquentRepository;

class UserRepository extends AbstractEloquentRepository
{
    public function findById(string $id): ?User
    {
        return $this->getQueryBuilder()
                    ->where(User::ID_COLUMN, $id)
                    ->first();
    }

    public function create(array $attributes): User
    {
        return $this->getQueryBuilder()
                    ->create($attributes);
    }

    public function findByPhoneNumberAndEmail(string $phoneNumber, string $email): ?User
    {
        return $this->getQueryBuilder()
                    ->where(User::EMAIL_COLUMN, $email)
                    ->where(User::PHONE_COLUMN, $phoneNumber)
                    ->first();
    }

    public function findByEmail(mixed $email): ?User
    {
        return $this->getQueryBuilder()
                    ->where(User::EMAIL_COLUMN, $email)
                    ->first();
    }

    protected function getModelClass(): string
    {
        return User::class;
    }
}
