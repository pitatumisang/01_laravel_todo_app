<?php

namespace App\Repositories\User;

class UserRepository implements UserRepositorInterface
{
    // register the user
    public function registerUser(array $data)
    {
        User::create($data);
    }
}
