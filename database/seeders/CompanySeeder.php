<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company = [
            [
                'name'=>'Sillicon Vallet',
                'object'=>'Maintenance Informatique',
                'country_sigle'=>'Unité-Progrès-Justice',
                'email'=>'silliconvallet@gmail.com',
                'Postal_code'=>'BP Ouaga sillicon vallet 2070FC',
                'country'=>'Burkina Faso',
                'city'=>'Ouagadougou',
                'img_name'=>'avatar.png',
                'gps'=>'11111.336699.2552222.0001',
                'locality'=>'Ard 3 / sect10 / Sissin',
                'info_locality'=>'Non loin du lycée privé Reedwane sur avenu jean pierre guingané',
            ],
        ];
        Company::insert($company);
    }
}
