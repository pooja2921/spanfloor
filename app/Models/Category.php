<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\ControllerHelpers\BaumHelper;
use Illuminate\Database\Eloquent\Model;
use Baum\NestedSet\Node as WorksAsNestedSet;

class Category extends Model
{
    use HasFactory,WorksAsNestedSet;

    protected $fillable = ["id", "name","slug","type","user_id","left", "right", "depth", "parent_id","image"];

    public function categoryTree($type){
       // return $type;
         $categorywithroot = $this->roots()->where('type',$type)->with('children')->get();
        $categories =[];
        foreach($categorywithroot as $categorieroot)
        {
            $categories[] = BaumHelper::renderNode($categorieroot);
        }
        return $categories;
    }

    public function categoryTreeSelected($type,$selectedcategory){
        $categorywithroot = $this->roots()->where('type',$type)->with('children')->get();
        $categories =[];
        foreach($categorywithroot as $categorieroot) {
            $categories[] = BaumHelper::renderSelectedNode($categorieroot, $selectedcategory);
        }

        return $categories;
    }


    public function children()
    {
        return $this->hasMany('App\Models\Category', 'parent_id','id');
    }

    
}
