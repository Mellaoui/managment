<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Patient extends Model
{
    use HasApiTokens;
    //protected $table = 'users';

    protected $fillable = [
        'name' , 'age' ,'gender', 'phone' ,'working', 'status', 'salary','reason','user_id'
    ];

    public function users()
    {
         return $this->hasMany('App\User');
    }

    public function consultations()
    {
        return $this->hasMany('App\Consultation');
    }

    
}
