<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Tour extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $casts = [
        'days_en' => 'array',
        'days_hy' => 'array'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
    public function review()
    {
        return $this->hasMany(Review::class);
    }
    public static function getAll()
    {
        $top_tours = Tour::get();

        if(!$top_tours){
            throw new ModelNotFoundException();
        }

        return $top_tours;
    }
    public static function getTops()
    {
        $top_tours = Tour::where('rating', '>=', '4')->limit(4)->orderByDesc('created_at')->get();

        if(!$top_tours){
            throw new ModelNotFoundException();
        }

        return $top_tours;
    }
    public static function count($destination_id)
    {
        $count = Tour::where('destination_id', $destination_id)->count();

        return $count;
    }
    public static function scopeFilter($query, array $filters)
    {
        $tours_with_discount = Tour::where('discount', '>', 0);

        if(isset($filters['min_price']) && isset($filters['max_price'])){
            $filters['min_price'] = (int)$filters['min_price'];
            $filters['max_price'] = (int)$filters['max_price'];
        }

        $query->when($filters['keyword'] ?? false, fn($query, $keyword) =>
            $query->where(fn($query) =>
                $query->where('title_'.app()->getLocale().'', 'like', '%' . $keyword . '%')
                ->orWhere('title_'.app()->getLocale().'', 'like', '%' . $keyword . '%')
            )
        );

        $query->when($filters['destination'] ?? false, fn($query, $destination) =>
            
            $query->whereHas('destination', fn($query) =>
                    $query->where('slug', $destination)
            )
        );

        if(isset($filters['duration']) && $filters['duration'] == '5plus'){
            $query->when($filters['duration'] ?? false, fn($query) =>
                $query->where(fn($query) =>
                    $query->where('duration_'.app()->getLocale().'', '>', 5)
                    ->orWhere('duration_'.app()->getLocale().'', '>', 5)
                )
            );
        }else{
            $query->when($filters['duration'] ?? false, fn($query, $duration) =>
                $query->where(fn($query) =>
                    $query->where('duration_'.app()->getLocale().'', 'like', '%' . $duration . '%')
                    ->orWhere('duration_'.app()->getLocale().'', 'like', '%' . $duration . '%')
                )
            );
        }

        $query->when($filters['month'] ?? false, fn($query, $month) =>
            $query->whereMonth('availability', $month)
        );

        $query->when($filters['rating'] ?? false, fn($query, $rating) =>
            $query->where('rating', '=', $rating)
        );

        if($tours_with_discount){
            $query->when($filters['min_price'] ?? false, fn($query, $min_price) =>
                $query->whereRaw('price - (price * discount / 100) >= '.$min_price)
            );

            $query->when($filters['max_price'] ?? false, fn($query, $max_price) =>
                $query->whereRaw('price - (price * discount / 100) <= '.$max_price)
            );
        }else{
            $query->when($filters['min_price'] ?? false, fn($query, $min_price) =>
                $query->where('price', '>=', $min_price)
            );

            $query->when($filters['max_price'] ?? false, fn($query, $max_price) =>
                $query->where('price', '<=', $max_price)
            );
        }

        $query->when($filters['min_age'] ?? false, fn($query, $min_age) =>
            $query->whereIn('min_age', $min_age)
        );

        $query->when($filters['category'] ?? false, fn($query, $category) =>
            $query->whereHas('category', fn($query) =>
                    $query->whereIn('slug', $category)
            )
        );
    }
}
