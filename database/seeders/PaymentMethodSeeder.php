<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $paymentMethods = [
            'Thanh toán khi nhận hàng (COD)',
            'Ví ShopeePay',
            'Thẻ Tín dụng/Ghi nợ',
            'Chuyển khoản ngân hàng',
        ];

        foreach ($paymentMethods as $name) {
            try {
                // Insert into table payment_methods
                Payment::create([
                    'name' => $name,
                ]);

                echo "Inserted ($name): Passed";
                echo PHP_EOL; // new line
            } catch (\Exception $exception) {
                echo 'Insert '. $name .': Failed - Error Message: ' . $exception->getMessage();
                echo PHP_EOL; // new line
            }
        }
    }
}
