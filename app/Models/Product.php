<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = ['name','slug','description','filepath','weight','price','quantity','user_id','status','partner_id','category_id'];
}
