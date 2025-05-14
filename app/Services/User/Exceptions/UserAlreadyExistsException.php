<?php

namespace App\Services\User\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

final class UserAlreadyExistsException extends Exception {
    public function __construct() {
        parent::__construct('User already exists!', Response::HTTP_BAD_REQUEST);
    }
}
