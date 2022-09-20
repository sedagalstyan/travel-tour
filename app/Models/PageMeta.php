<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageMeta extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function findMeta($page){
        $metas = PageMeta::where('page', $page)->get();
                        
        return $metas;
    }
}
