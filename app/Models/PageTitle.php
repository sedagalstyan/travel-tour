<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PageTitle extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    protected $guarded = [];

    protected $table = 'pages_titles';

    public static function findTitle($page){
        $title = PageTitle::select('title_'.app()->getLocale().'')
                        ->where('page', $page)
                        ->get();
                        
        return $title;
    }
}
