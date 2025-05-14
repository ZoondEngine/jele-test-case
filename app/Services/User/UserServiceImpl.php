<?php

namespace App\Services\User;

use App\Models\User;
use App\Services\User\Enums\UserGenderType;
use App\Services\User\Exceptions\UserAlreadyExistsException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

final class UserServiceImpl implements UserServiceInterface {
    /**
     * @param string $email
     * @param string $password
     * @param UserGenderType $gender
     * @return User
     * @throws UserAlreadyExistsException
     */
    public function create(string $email, string $password, UserGenderType $gender): User {
        if(User::query()->where('email', $email)->exists()) {
            throw new UserAlreadyExistsException();
        }

        return User::query()->create([
            'name' => Str::orderedUuid(),
            'email' => $email,
            'password' => Hash::make($password),
            'gender' => $gender
        ]);
    }

    /**
     * @param int $id
     * @return User
     */
    public function findById(int $id): User {
        return User::query()->findOrFail($id);
    }
}
