<?php

namespace App\Enums;

use Illuminate\Support\Str;

enum UserType: string
{
    case Admin = 'admin';
    case Standard = 'standard';

    /**
     * List of all user types for use in dropdowns.
     */
    public static function forSelect(string $scope): array
    {
        $values = [];

        $list = match ($scope) {
            'all' => self::cases(),
            'creating' => self::forCreation(),
            'updating' => self::cases(),
            'register' => self::forRegister(),
            default => self::cases(),
        };

        foreach ($list as $case) {
            array_push($values, [
                'id' => $case->value,
                'name' => Str::of($case->value)->snake()->replace('_', ' ')->title(),
            ]);
        }

        return $values;
    }

    /**
     * List of user types that can be created from the Admin UI.
     */
    public static function forCreation(): array
    {
        return [
            self::Admin,
            self::Standard,
        ];
    }

    /**
     * List of user types that can be registered from the public registration form.
     */
    public static function forRegister(): array
    {
        return [
            self::Standard,
        ];
    }

}
