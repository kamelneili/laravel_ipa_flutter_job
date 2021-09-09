<?php
namespace App\Http\Controllers;
use App\Http\Resources\ProductResource;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function index()
    {
        $posts = Product::paginate(12);
        return ProductResource::collection( $posts );
    }
    public function search($query)
    {


     //   $query = $request->input('query');

         $products = Product::where('title', 'like', "%$query%")
                           // ->orWhere('details', 'like', "%$query%")
        //                    ->orWhere('description', 'like', "%$query%")
                           ->paginate(30)
                        ;

        //$products = Product::search($query)->paginate(10);
        return ProductResource::collection( $products );
    }
}
