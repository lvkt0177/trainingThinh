<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

use Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::insert([
                [
                    'first_name' => 'Admin',
                    'last_name' => 'Super',
                    'email' => 'superadmin@khgc.com',
                    'password' => Hash::make('Abcd@1234'),
                    'address' => '89/12 Nguyễn Hồng Đào, Phường 14, Quận Tân Bình, Thành phố Hồ Chí Minh, Việt Nam',
                    'status' => 1,
                    'role' => 'admin',
                ],
                [
                    'first_name' => 'Le',
                    'last_name' => 'Thinh',
                    'email' => 'lvkt0177@gmail.com',
                    'password' => Hash::make('T123@123'),
                    'address' => 'Quan 4, TP.HCM',
                    'status' => 1,
                    'role' => 'user',
                ],
            ]);

    }
}
