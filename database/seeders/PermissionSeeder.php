<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [

            /* ........................................ GESTION DES INFORMATION DE LA STRUCTURE.................................................   */
            [
                'name' => 'company_access',
            ],
        
            /* ........................................ GESTION DES     AGENTS.........................1........................   */
            [
                'name' => 'users_access',
            ],

            [
                'name' => 'create_users_access',
            ],

            [
                'name' => 'view_users_access',
            ],

            [
                'name' => 'update_users_access',
            ],

            [
                'name' => 'block_users_access',
            ],

            [
                'name' => 'permit_users_access',
            ],

            [
                'name' => 'delete_users_access',
            ],

            /* ........................................ GESTION DES     ADMININISTRATEURS.........................8.......................   */
            [
                'name' => 'admin_access',
            ],

            [
                'name' => 'view_admin_access',
            ],

            [
                'name' => 'update_admin_access',
            ],

            [
                'name' => 'block_admin_access',
            ],

            [
                'name' => 'permit_admin_access',
            ],

            [
                'name' => 'delete_admin_access',
            ],

            /* ........................................GESTION DES PAIEMENTS..............................14..................   */
            [
                'name' => 'invoice_access',
            ],

            [
                'name' => 'create_invoice_access',
            ],

            [
                'name' => 'view_invoice_access',
            ],

            [
                'name' => 'delete_invoice_access',
            ],

            [
                'name' => 'update_invoice_access',
            ],

            
        ];
        Permission::insert($permission);
    }
}
