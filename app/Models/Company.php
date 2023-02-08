<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'object',
        'email',
        'Postal_code',
        'country',
        'city',
        'country_sigle',
        'locality',
        'info_locality',
        'gps',
        'img_name',
        'img_link',
        'web_link'
     ];
 
     protected $table = 'company';
 
     public function users(){ 
         return $this->hasMany(User::class); 
     }  

     public function telephone(){ 
        return $this->hasMany(Telephone::class); 
    }   
}
