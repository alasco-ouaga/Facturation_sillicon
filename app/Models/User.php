<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'administrateur',
        'is_permits',
        'email',
        'email_verified_at',
        'password',
        'verification_token',
        'remember_token',
        'created_at',
        'updated_at',
        'deleted_at',
        'img_name',
        'company_id',
        'img_link'
    ];



    public function roles(){
        
        return $this->belongsToMany(Role::class);
    }

    public function connexionHistories(){ 
        return $this->hasMany(Connexionhistory::class); 
    } 

    public function invoices(){ 
        return $this->hasMany(Invoice::class); 
    }
    
    public function company(){ 
        return $this->belongsTo(Company::class); 
    } 

}
