<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginAction extends Model
{
    use HasFactory;
    protected $fillable = [
        'get_id',
        'action_type',
        'time_of_action',
     ];


     protected $table = 'loginactions';
    public function connexionHistory(){ 
        return $this->belongsTo(ConnexionHistory::class); 
    }   
 
}
