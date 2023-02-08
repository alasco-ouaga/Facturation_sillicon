<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\RoleUsers;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            
            //administrateur
            [
                'user_id' => 1 ,
                'role_id'    => 1,
            ],

            [
                'user_id' => 1 ,
                'role_id'    => 2,
            ],

            [
                'user_id' => 1 ,
                'role_id'    => 3,
            ],

            //moderateur
            [
                'user_id' => 2 ,
                'role_id'    => 2,
            ],

            [
                'user_id' => 2 ,
                'role_id'    => 3,
            ],

            //........................
            [
                'user_id' => 3 ,
                'role_id'    => 2,
            ],

            [
                'user_id' => 3 ,
                'role_id'    => 3,
            ],

            //agents
            [
                'user_id' => 4 ,
                'role_id'    => 3,
            ],

            //.............................
            [
                'user_id' => 5 ,
                'role_id'    => 3,
            ],

        ];
        RoleUsers::insert($roles);
    }
}
