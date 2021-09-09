<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title' ,
         'category_id'
    ];
    public function category(){
        return $this->belongsTo( Category::class );
    }
    public function reviews(){
        return $this->hasMany( Review::class );
    }
	 public static function searchp($key)
    {
        var_dump(Product::all()->where('title', 'like', '%' .$key. '%'));
        return Product::all()->where('title', 'like', '%' .$key. '%');
    }
    //
}
