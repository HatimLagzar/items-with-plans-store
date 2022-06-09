<?php

namespace App\Services\Core\User;

use App\Models\User;
use App\Repositories\User\UserRepository;

class UserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function findById(string $id): ?User
    {
        return $this->userRepository->findById($id);
    }

    public function create(array $attributes): User
    {
        return $this->userRepository->create($attributes);
    }

    public function findByPhoneNumberAndEmail(string $phoneNumber, string $email): ?User
    {
        return $this->userRepository->findByPhoneNumberAndEmail($phoneNumber, $email);
    }

    public function findByEmail(mixed $email): ?User
    {
        return $this->userRepository->findByEmail($email);
    }
}
