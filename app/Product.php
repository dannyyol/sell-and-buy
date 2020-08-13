<?php

namespace App;
// use Spatie\Searchable\Searchable;
// use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $fillable = ['name','price', 'description','negotiate','status','slug', 'category','category_id', 'image', 'school_id'];
        
    public static function boot() {
        parent::boot();
        static::creating(function ($product){
            $product->slug = Str::slug($product->name);
        });
    } 
    
      public function category()
      {
          return $this->belongsTo(Category::class);
      }

      public function user()
      {
          return $this->belongsTo(User::class);
      }

      public function school()
      {
          return $this->belongsTo(School::class);
      }

      public function getRouteKeyName()
      {
          return 'slug';
      }

      public function getUrlAttribute() 
        {
            URL::route('products.show', array('id' => $this->id, 'slug' => Str::slug($this->name)));
            
        }
//search function
    //   public function getSearchResult(): SearchResult
    // {
    //     $url = route('product.show', $this->id);
    //
    //     return new SearchResult(
    //         $this,
    //         $this->name,
    //         $url
    //     );
    // }

    public function product_images()
    {
//       return $this->hasMany('App\Product');
      return $this->hasMany(ProductImage::class);
    }

}
