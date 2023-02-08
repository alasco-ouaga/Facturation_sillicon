<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;


    protected $fillable = [
        'amount',
        'type',
        'note',
        'user_id',
        'invoice_id',
        'code'
     ];

    protected $table = 'payments';
    
    public function invoice(){ 
        return $this->belongsTo(Invoice::class); 
    }   

    
  
}
