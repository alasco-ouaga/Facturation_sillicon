<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telephone extends Model
{
    use HasFactory;

    protected $table = 'telephones';

    protected $fillable = [
        'phone',
        'company_id',
     ];

     public function company(){ 
        return $this->belongsTo(Campany::class); 
    }   



}
