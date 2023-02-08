<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Dotenv\Util\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'company_id'=>1,
                'first_name'=> 'Ilboudo ',
                'last_name' => 'basener',
                'administrateur' => true,
                'phone'=>'75456789',
                'is_permits'=>true,
                'email' => 'administrateur@administrateur.com',
                'img_name'=>'avatar.png',
                'password' => bcrypt('password'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],

            [
                'company_id'=>1,
                'first_name'=> 'Kambou',
                'last_name' => 'sami Denis',
                'administrateur' => true,
                'phone'=>'75845678',
                'is_permits'=>true,
                'email' => 'moderateur.sami@sami.com',
                'img_name'=>'avatar.png',
                'password' => bcrypt('password'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ], 

            [
                'company_id'=>1,
                'first_name'=> 'Ilboudo',
                'last_name' => 'Alassane',
                'administrateur' => true,
                'phone'=>'75845679',
                'is_permits'=>true,
                'email' => 'moderateur.alassane@alassane.com',
                'img_name'=>'avatar.png',
                'password' => bcrypt('password'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ], 

            [
                'company_id'=>1,
                'first_name'=> 'Ouedraogo',
                'last_name' => 'Aissetou',
                'administrateur' => true,
                'phone'=>'75845179',
                'is_permits'=>true,
                'email' => 'agent.aissa@aissa.com',
                'img_name'=>'avatar.png',
                'password' => bcrypt('password'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ], 

            [
                'company_id'=>1,
                'first_name'=> 'traore',
                'last_name' => 'sadiatou',
                'administrateur' => true,
                'phone'=>'75145179',
                'is_permits'=>true,
                'email' => 'agent.sadia@sadia.com',
                'img_name'=>'avatar.png',
                'password' => bcrypt('password'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],  
        ];
        User::insert($users);
    }
}
