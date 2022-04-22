<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name','mobile','mobilealt','email','description','dob','gender','user_id','status','role','image','last_login_at','last_logout_at','password'];

    

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
