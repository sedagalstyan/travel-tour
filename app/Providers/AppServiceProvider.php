<?php

namespace App\Providers;

use App\Models\Review;
use App\Models\Tour;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Artisan::call('optimize:clear');
        
        Carbon::setLocale(app()->getLocale());

        $reviews = Review::select('tour_id', DB::raw('ROUND(AVG(rating), 1) as rating'))->groupBy('tour_id')->get();

        foreach($reviews as $review){
            Tour::where('id', $review->tour_id)->update([
                'rating' => $review->rating
            ]);
        }
    }
}
