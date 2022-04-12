<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $allProduct = Product::with('category')
        ->leftJoin('categories','products.category_id','=','categories.id')
        ->select('Products.*', 'categories.name as category_name')
        ->paginate(10);



        return view('welcome',[
            'products'=> $allProduct
        ]);
    }
}
