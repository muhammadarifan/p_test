<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            (object) [
                'name' => 'Bapak Budi',
                'email' => 'bapak_budi@gmail.com',
                'password' => 'polygonbikes',
                'role' => 'BAPAK',
            ],
            (object) [
                'name' => 'Anak Budi',
                'email' => 'anak_budi@gmail.com',
                'password' => 'polygonbikes',
                'role' => 'ANAK',
            ],
        ];

        User::truncate();

        foreach ($users as $data) {
            $user = User::create([
                'name' => $data->name,
                'email' => $data->email,
                'password' => \Hash::make($data->password),
            ]);

            $user->assignRole($data->role);
        }
    }
}
