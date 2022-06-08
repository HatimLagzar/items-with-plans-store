<?php

namespace App\Services\Domain\Auth;

use App\Models\User;

use function auth;

class LoginService
{
    public function login(
        string $email,
        string $password,
        int $type = User::NORMAL_TYPE,
        string $guard = 'web'
    ): bool {
        return auth()->guard($guard)->attempt(
            [
                User::EMAIL_COLUMN     => $email,
                User::PASSWORD_COLUMN  => $password,
                User::USER_TYPE_COLUMN => $type,
            ],
            true
        );
    }
}
