<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
    public static function count($tour_id)
    {
        $count = Review::where('tour_id', $tour_id)->count();

        return $count;
    }
    public static function hasReview($user_id, $tour_id){
        $hasReview = Review::where(['user_id' => $user_id, 'tour_id' => $tour_id])->get();

        return $hasReview;
    }
}
