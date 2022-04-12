<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CateogySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'men',
            'women',
            'watches'
        ];

        foreach ($categories as $categoryName) {
            try {
                // Insert into table categories
                Category::create([
                    'name' => $categoryName,
                    'parent_id' => 0, // default value is 1 (level 1)
                    'level' => 1, // default value is 1
                    'status'  => Category::STATUS[1], // default value is 1 (SHOW)
                ]);

                echo "Inserted ($categoryName): Passed";
                echo PHP_EOL; // new line
            } catch (\Exception $exception) {
                echo 'Insert '. $categoryName .': Failed - Error Message: ' . $exception->getMessage();
                echo PHP_EOL; // new line
            }
        }
    }
}
