<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    use HasFactory;

    protected $fillable = ["userid", "recNoParent","title","description","image","slug"];


    public function children()
    {
        return $this->hasMany('App\Models\ItemCategory', 'parent_id','id');
    }

    
}
