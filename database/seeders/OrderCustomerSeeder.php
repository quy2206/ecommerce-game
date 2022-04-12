<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use App\Utils\CommonUtil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class OrderCustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {

        //
        $faker = Faker::create();

        $products = Product::all();

        $paymentMethod = Payment::first();

        $total = $products->count();
        $users = User::take(20)->get();


        if (!empty($products) && !empty($users)) {
            foreach ($users as $user) {
                $arrayKeys = range(0, ($total - 1));

                $quantity = random_int(1, 10);
                $random = random_int(1, 5);
                $orderDate = date('Y-m-d', strtotime("+$random day"));

                DB::beginTransaction();

                try {
                    //code...
                    $order = Order::create([
                        'user_id' => $user->id,
                        'payment_method_id' => $paymentMethod->id,
                        'code' => CommonUtil::generateUUID() ,
                        'fullname' => $faker->name,
                        'email' => $faker->unique()->safeEmail,
                        'phone' => $faker->phoneNumber,
                        'address' => $faker->address,
                        'comment' => $faker->text,
                        'order_date' => $orderDate,

                    ]);
                    $randKeys = array_rand($arrayKeys, 2);
                    $orderDetailSave = [];
                    foreach ($randKeys as $key) {
                        // get Product by $key
                        $product = $products[$key];

                        // Define Variable $quantity
                        $quantity = random_int(1, 10);

                        $orderDetailSave[] = new OrderDetail([
                            'product_id' => $product->id,
                            'price' => $product->price,
                            'quantity' => $quantity,
                        ]);
                    }
                    $order->orderDetails()->saveMany($orderDetailSave);
                    DB::commit();

                    echo '[OrderCustomerSeeder] Save OK';
                    echo PHP_EOL; // new line

                } catch (\Exception $ex) {
                    //throw $th;
                    Log::error($ex);

                    // Rollback
                    DB::rollBack();

                    echo '[OrderCustomerSeeder] Save FAIL';
                    echo PHP_EOL; // new line

                    echo $ex->getMessage();
                    echo PHP_EOL; // new line
                }
            }
        }
    }
}
