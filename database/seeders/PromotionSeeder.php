<?php

namespace Database\Seeders;

use App\Models\Promotion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $discountPercents = [
            5,
            10,
            20,
            30,
            40,
            50,
        ];
        $discountMoneys = [
            200000,
            300000,
            400000,
            500000,
        ];
        $types = [
            'money', // [0] => 'money'
            'percent', // [1] => 'percent'
        ];
        $beginDate = date('2021-04-01 00:00:00');
        $endDate = date('Y-m-d 23:59:59', strtotime($beginDate . ' + 1 months'));
        $endDate = date('Y-m-d 23:59:59', strtotime($endDate . ' - 1 days'));

        for ($i = 0; $i <  10; $i++) {
            // get value of type
            $type = $types[array_rand($types)];

            // get value of discount
            if ($type == 'money') { // type = 0
                $discount = $discountMoneys[array_rand($discountMoneys)];
            } else { // type = 1
                $discount = $discountPercents[array_rand($discountPercents)];
            }

            $promotion = [
                'type' => $type,
                'discount' => $discount,
                'begin_date' => $beginDate,
                'end_date' => $endDate,
                'quantity' => 100,
                'status' => 1,
            ];
            Promotion::create($promotion);
            $beginDate = date('Y-m-d 00:00:00', strtotime($endDate . ' + 1 days'));

            $endDate = date('Y-m-d 23:59:59', strtotime($beginDate . ' + 1 months'));
            $endDate = date('Y-m-d 23:59:59', strtotime($endDate . ' - 1 days'));

    }
}
}
