<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $payments = [
                [
                    'invoice_id'=>1,
                    'user_id'=>2,
                    'amount'=>15000,
                    'type'=>'mobile',
                    'code'=>'SV-1020320',
                ],

                [
                    'invoice_id'=>2,
                    'user_id'=>2,
                    'amount'=>15000,
                    'type'=>'physique',
                    'code'=>'SV-1020321',
                ],

                [
                    'invoice_id'=>3,
                    'user_id'=>2,
                    'amount'=>15000,
                    'type'=>'mobile',
                    'code'=>'SV-1020322',
                ],

                [
                    'invoice_id'=>4,
                    'user_id'=>3,
                    'amount'=>15000,
                    'type'=>'mobile',
                    'code'=>'SV-1020323',
                ],

                [
                    'invoice_id'=>5,
                    'user_id'=>3,
                    'amount'=>15000,
                    'type'=>'Mobile',
                    'code'=>'SV-1020324',
                ],
            ];
            Payment::insert($payments);
    }
}
