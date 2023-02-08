<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'code',
        'phone',
        'pc_mark',
        'pc_disk',
        'problem',
        'is_connect',
        'is_payed',
        'pc_rame',
        'amount'
    ];

    protected $table = 'invoices';

    public function payments(){ 
        return $this->hasMany(Payment::class); 
    }  
    public function user(){ 
        return $this->belongsTo(User::class); 
    } 
}
