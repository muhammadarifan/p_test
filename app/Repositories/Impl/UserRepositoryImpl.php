<?php

namespace App\Repositories\Impl;

use App\Models\User;
use App\Repositories\UserRepository;

class UserRepositoryImpl implements UserRepository {
    public function getAll() {
        return User::all();
    }

    public function getById($id) {
        return User::find($id);
    }

    public function create(array $data) {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => \Hash::make($data['password']),
        ]);

        $user->assignRole($role);
    }

    public function update($id, array $data) {
        $user = User::find($id);
        $user->update($data);
        return $user;
    }

    public function delete($id) {
        $user = User::find($id);
        $user->delete();
        return $user;
    }
}
