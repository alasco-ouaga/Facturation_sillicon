<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $roles = [

            [
                'name' => 'administrateur',
            ],

            [
                'name' => 'moderateur',
            ],
            
            [ 
                'name' => 'agent',
            ], 
        ];

        Role::insert($roles);
    }
}
