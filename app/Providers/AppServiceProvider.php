<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
// use App\Tag;
use App\Threadcategory;
use App\Thread;
use Illuminate\Support\Facades\DB;

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
    public function boot(Threadcategory $threadcategory)
    {
        //


        Schema::defaultStringLength(191);
        
        // View::share('td_categories', Threadcategory::all());
        View::share('tdcategory', Threadcategory::withCount('threads')->get());
        View::share('cate', DB::select('select * from threadcategories LIMIT 1 '));
        View::share('categories', Threadcategory::all());
        // View::share('tags', Tag::all());
        View::share('threadCount', Thread::all()->count());
      
        // View::share('count', Threadcategory::where('tdCategory', $threadcategory->$id)->get());
        // View::share('tagsCount', Tag::all()->count());
        
        


    }

}
