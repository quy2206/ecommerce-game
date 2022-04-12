<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class ProductSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo json_encode('[Begin] Insert Data for module Product');
        echo PHP_EOL;
        include 'data_fakes/products/men.php';
        include 'data_fakes/products/women.php';
        include 'data_fakes/products/watches.php';
        //
        include 'data_fakes/quantities.php';
        include 'data_fakes/prices.php';
        $dataInserts = [
            $men,
            $women,
            $watches,
        ];
        if (!empty($dataInserts)) {
            foreach ($dataInserts as $value)
                $categorySlug = $value['category_slug'];
            $products = $value['products'];
            $category = Category::where('slug', $categorySlug)->first();

            if (!empty($category)) {
                if (!empty($products)) {
                    foreach ($products as $product) {
                        try {
                            $dateProductSave = Product::create([
                                'name' => $product['name'],
                                'thumbnail' => $product['thumbnail'],
                                'description' => $product['description'],
                                'quantity' => $quantities[array_rand($quantities)],
                                'price' => $prices[array_rand($prices)],
                                'category_id' => $category->id,

                            ]);
                            echo 'Inserted ' . $product['name'] . ': Passed';
                            echo 'Inserted product_images: Passed';
                            echo PHP_EOL; // new line
                        } catch (\Exception $err) {
                            //throw $th;
                            echo 'Insert ' . $product['name'] . ': Failed - Error Message: ' . $err->getMessage();
                            echo PHP_EOL; // new line
                        }
                    }
                }
            }
        }
    }
}
