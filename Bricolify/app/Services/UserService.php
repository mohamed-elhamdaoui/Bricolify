<?php

namespace App\Services;

use App\Models\User;
use App\Models\Notification;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function registerUser($name, $email, $password, $role, $phone)
    {
        $user = User::create([
            'name'     => $name,
            'email'    => $email,
            'password' => Hash::make($password),
            'role'     => $role,
            'phone'    => $phone,
        ]);

        Notification::create([
            'user_id'         => $user->id,
            'type'            => 'Welcome to Bricolify',
            'message'         => 'Welcome ' . $user->name . '! We are glad to have you here. Start by completing your profile.',
            'notifiable_type' => User::class,
            'notifiable_id'   => $user->id,
            'is_read'         => false,
        ]);

        return $user;
    }
}
