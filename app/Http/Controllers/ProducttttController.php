<?php
namespace App\Http\Controllers;
use App\Http\Resources\ProductResource;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function index()
    {
        $posts = Product::all();
        return ProductResource::collection( $posts );
    }
}
