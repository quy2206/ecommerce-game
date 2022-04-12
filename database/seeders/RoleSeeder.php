<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
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
                'id' => 1,
                'name' => 'Admin'
            ],
            [
                'id' => 2,
                'name' => 'Employee'
            ],
            [
                'id' => 3,
                'name' => 'Shipper'
            ],
        ];

        // Insert Multiple Rows
        Role::upsert($dataInserts, ['id']);

        // Announce (result)
        echo 'Insert into Data for table roles - Passed';
        echo PHP_EOL; // new line

        echo json_encode($dataInserts);
        echo PHP_EOL; // new line
    }
}
