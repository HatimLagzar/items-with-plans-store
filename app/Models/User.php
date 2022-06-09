<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public const ADMIN_TYPE = 1;
    public const NORMAL_TYPE = 2;

    public const TABLE = 'users';
    public const ID_COLUMN = 'id';
    public const USER_TYPE_COLUMN = 'user_type';
    public const EMAIL_COLUMN = 'email';
    public const PASSWORD_COLUMN = 'password';
    public const REMEMBER_TOKEN_COLUMN = 'remember_token';
    public const EMAIL_VERIFIED_AT_COLUMN = 'email_verified_at';
    public const PHONE_COLUMN = 'phone';
    public const VERIFICATION_TOKEN_COLUMN = 'verification_token';
    public const LAST_NAME_COLUMN = 'last_name';
    public const FIRST_NAME_COLUMN = 'first_name';

    protected $table = self::TABLE;

    protected $fillable = [
        self::FIRST_NAME_COLUMN,
        self::LAST_NAME_COLUMN,
        self::EMAIL_COLUMN,
        self::PASSWORD_COLUMN,
        self::VERIFICATION_TOKEN_COLUMN,
        self::PHONE_COLUMN,
    ];

    protected $hidden = [
        self::PASSWORD_COLUMN,
        self::REMEMBER_TOKEN_COLUMN,
    ];

    protected $casts = [
        self::EMAIL_VERIFIED_AT_COLUMN => 'datetime',
    ];

    public function isAdmin(): bool
    {
        return $this->getUserType() === self::ADMIN_TYPE;
    }

    public function getVerificationToken(): string
    {
        return $this->getAttribute(self::VERIFICATION_TOKEN_COLUMN);
    }

    public function getUserType(): int
    {
        return $this->getAttribute(self::USER_TYPE_COLUMN);
    }

    public function getId(): int
    {
        return $this->getAttribute(self::ID_COLUMN);
    }

    public function getFirstName(): string
    {
        return $this->getAttribute(self::FIRST_NAME_COLUMN);
    }

    public function getLastName(): string
    {
        return $this->getAttribute(self::LAST_NAME_COLUMN);
    }

    public function getEmail(): string
    {
        return $this->getAttribute(self::EMAIL_COLUMN);
    }

    public function getPhoneNumber(): string
    {
        return $this->getAttribute(self::PHONE_COLUMN);
    }
}
