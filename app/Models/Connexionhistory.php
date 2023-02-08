<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Connexionhistory extends Model
{
    use HasFactory;
    protected $fillable = [
       'date_of_login',
       'date_of_logout',
       'time_of_login',
       'time_of_logout'
    ];

    protected $table = 'connexionhistory';

    public function loginaction(){ 
    
        return $this->hasMany(LoginAction::class); 
    } 

    public function users(){ 
    
        return $this->belongsTo(User::class); 
    } 
}
