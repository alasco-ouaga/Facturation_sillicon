<?php

namespace Database\Seeders;

use App\Models\Invoice;
use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        
            $invoice = [
                [
                    'user_id'=>1,
                    'first_name' =>'Ilboudo',
                    'last_name' =>'Samiratou',
                    'code'=>'SV-1020320',
                    'phone' =>75455370 ,
                    'amount' =>15000 ,
                    'pc_mark' =>'HP corp i3' ,
                    'pc_disk' =>'500 Go' ,
                    'pc_rame' =>'16 Go' ,
                    'problem' =>"probleme d'ecrant ",
                    'is_connect' =>true, 
                    'is_payed'=>true,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ],

                [
                    'user_id'=>3,
                    'first_name' =>'Kambou',
                    'last_name' =>'Rakietou',
                    'code'=>'SV-1020321',
                    'phone' =>75455379 ,
                    'amount' =>15000 ,
                    'pc_mark' =>'HP corp i3' ,
                    'pc_disk' =>'500 Go' ,
                    'pc_rame' =>'16 Go' ,
                    'problem' =>"probleme d'alimentation ",
                    'is_connect' =>true, 
                    'is_payed'=>true,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ],

                [
                    'user_id'=>4,
                    'first_name' =>'Traoré',
                    'last_name' =>'Mamadi',
                    'code'=>'SV-1020322',
                    'amount' =>15000 ,
                    'phone' =>78455370 ,
                    'pc_mark' =>'HP corp i3' ,
                    'pc_disk' =>'500 Go' ,
                    'pc_rame' =>'16 Go' ,
                    'problem' =>"problème anonyme",
                    'is_connect' =>true, 
                    'is_payed'=>true,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ],

                [
                    'user_id'=>3,
                    'first_name' =>'Ouedraogo',
                    'last_name' =>'Issa',
                    'code'=>'SV-1020323',
                    'amount' =>15000 ,
                    'phone' =>75455370 ,
                    'pc_mark' =>'HP corp i7' ,
                    'pc_disk' =>'1 TO' ,
                    'pc_rame' =>'16 Go' ,
                    'problem' =>"problème de  clavier",
                    'is_connect' =>true, 
                    'is_payed'=>true,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ],

                [
                    'user_id'=>3,
                    'first_name' =>'Traore',
                    'last_name' =>'Abdoulay',
                    'code'=>'SV-1020324',
                    'amount' =>15000 ,
                    'pc_mark' =>'HP corp i5' ,
                    'pc_disk' =>'750 Go' ,
                    'pc_rame' =>'8 Go' ,
                    'phone' =>70455370 ,
                    'problem' =>"probleme de carte mere ",
                    'is_connect' =>true, 
                    'is_payed'=>true,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ],

            ];
            Invoice::insert($invoice);
    }
}
