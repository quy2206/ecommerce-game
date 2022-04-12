<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $dataInserts = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('admin123'),
                'remember_token' => Str::random(10),
            ],

            [
                'name' => 'Employee',
                'email' => 'employee1@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Shipper',
                'email' => 'shipper1@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'remember_token' => Str::random(10),
            ],
        ];
        Admin::upsert($dataInserts, ['name']);
        echo 'Insert into Data for table admins - Passed';
        echo PHP_EOL; // new line

        echo json_encode($dataInserts);
        echo PHP_EOL; // new line

    }
}
