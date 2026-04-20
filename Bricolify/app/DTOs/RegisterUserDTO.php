<?php

namespace App\DTOs;

use Illuminate\Http\UploadedFile;

readonly class RegisterUserDTO
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public string $role,
        public ?string $phone = null,
        public ?UploadedFile $avatar = null,
    ) {}
}
