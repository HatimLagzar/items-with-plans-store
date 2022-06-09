<?php

namespace App\DTO\Phone\Exception;

use Exception;

class InvalidPhoneException extends Exception
{
    private string $phoneNumber;

    public function __construct(string $phoneNumber, string $reason = 'invalid phone format')
    {
        parent::__construct($reason);
        $this->phoneNumber = $phoneNumber;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }
}
