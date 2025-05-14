<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\RegisterUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\User\UserServiceInterface;

class UserController extends Controller {
    /**
     * @param UserServiceInterface $userService
     */
    public function __construct(private readonly UserServiceInterface $userService) {
    }

    /**
     * @param RegisterUserRequest $request
     * @return UserResource
     */
    public function register(RegisterUserRequest $request): UserResource {
        return UserResource::make(
            $this->userService->create(...$request->validated())
        );
    }

    /**
     * @param User $user
     * @return UserResource
     */
    public function findById(User $user): UserResource {
        return UserResource::make(
            $this->userService->findById($user->id)
        );
    }
}
