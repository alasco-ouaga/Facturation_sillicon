<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Telephone;


class TelephoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $telephone = [
            [
                'phone'=>'75455370',
                'company_id'=>1,
            ],

            [
                'phone'=>'78455370',
                'company_id'=>1,
            ],

            [
                'phone'=>'70455370',
                'company_id'=>1,
            ],
        ];
        Telephone::insert($telephone);
    }
}
