<?php

namespace App\Services;

use App\DTOs\RegisterUserDTO;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function registerUser(RegisterUserDTO $dto): User
    {
        return DB::transaction(function () use ($dto) {
            return User::create([
                'name'     => $dto->name,
                'email'    => $dto->email,
                'password' => Hash::make($dto->password),
                'role'     => $dto->role,
                'phone'    => $dto->phone,
            ]);
        });
    }
}
