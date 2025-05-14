<?php

namespace App\Services\User;

use App\Models\User;
use App\Services\User\Enums\UserGenderType;

interface UserServiceInterface {
    public function create(string $email, string $password, UserGenderType $gender): User;
    public function findById(int $id): User;
}
