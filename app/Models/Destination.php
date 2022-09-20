<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Destination extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    protected $guarded = [];
    
    public static function getAll(){
        $destination = Destination::get();

        if(!$destination){
            throw new ModelNotFoundException();
        }

        return $destination;
    }
    public static function getTops(){
        $destination_id = Tour::select('destination_id', Tour::raw('count(*) as quantity'))
        ->groupBy('destination_id')->orderByDesc('quantity')->limit(4)->get();

        foreach($destination_id as $id){
            $destination[] = Destination::where('id', $id['destination_id'])->get();
        }

        return $destination;
    }
}
