<?php

namespace App\DTO\Phone;

use App\DTO\Phone\Exception\InvalidPhoneException;
use Illuminate\Support\Str;

class Phone
{
    public const PREFIX_CODE = '+39';

    private string $phoneNumber;

    /**
     * Phone constructor.
     *
     * @param  string  $phoneNumber
     *
     * @throws InvalidPhoneException
     */
    public function __construct(string $phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        $this->validate();
    }

    /**
     * @throws InvalidPhoneException
     */
    private function validate(): void
    {
        $regex = $this->getRegex();

        if ((bool)preg_match($regex, $this->phoneNumber) === false) {
            throw new InvalidPhoneException($this->phoneNumber, sprintf('invalid phone format %s', $this->phoneNumber));
        }
    }

    public static function getRegex(): string
    {
        return "/^(0|\+39)\d{10}$/";
    }

    public function getPhoneNumber(): string
    {
        if (Str::startsWith($this->phoneNumber, self::PREFIX_CODE)) {
            return $this->phoneNumber;
        }

        return preg_replace('/(0)(\d{10})/i', '+39$2', $this->phoneNumber);
    }

    public function __toString(): string
    {
        return $this->getPhoneNumber();
    }

    /**
     * @param  string|Phone  $phone
     *
     * @return bool
     */
    public function equals(string|Phone $phone): bool
    {
        if (is_string($phone)) {
            try {
                $phone = new Phone($phone);
            } catch (InvalidPhoneException $e) {
                return false;
            }
        }

        return $this->getPhoneNumber() === $phone->getPhoneNumber();
    }

    /**
     * @throws InvalidPhoneException
     */
    public static function fake(): self
    {
        return new Phone(
            sprintf(
                "0%d%d%d%d%d%d%d%d%d",
                rand(5, 8),
                rand(0, 9),
                rand(0, 9),
                rand(0, 9),
                rand(0, 9),
                rand(0, 9),
                rand(0, 9),
                rand(0, 9),
                rand(0, 9),
            )
        );
    }
}
