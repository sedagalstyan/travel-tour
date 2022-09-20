<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    public static function getAll(){
        $category = Category::get();

        if(!$category){
            throw new ModelNotFoundException();
        }
        
        return $category;
    }
}
