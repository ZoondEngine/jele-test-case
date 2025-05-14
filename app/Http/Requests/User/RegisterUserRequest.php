<?php

namespace App\Http\Requests\User;

use App\Services\User\Enums\UserGenderType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class RegisterUserRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'gender' => [
                'required',
                new Enum(UserGenderType::class)
            ]
        ];
    }

    /**
     * @param $key
     * @param $default
     * @return array
     */
    public function validated($key = null, $default = null): array
    {
        $validated = parent::validated($key, $default);

        $type = $validated['gender'];
        unset($validated['gender']);

        return array_merge($validated, [
            'gender' => UserGenderType::from($type),
        ]);
    }
}
