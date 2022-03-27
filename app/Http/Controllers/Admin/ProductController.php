<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use Illuminate\Http\Request;
use App\Http\Services\MenuService;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $menuService;


    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }
    public function index(Request $request)
    {
        $products = DB::table('products')

        ->leftJoin('categories','products.category_id','=','categories.id')
        ->select('Products.*', 'categories.name as category_name')
        ->get()
        ;

        return view('admin.products.index',[
            'products'=>$products,


        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = $this->menuService->getParent();
        return view('admin.products.create', [
            'cate'=> $cate
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->menuService->storeProduct($request);
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $products)
    {
        $categories = Category::get();
        return view('admin.products.edit',[
            'products'=> $products,
            'categories'=> $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $oldThumbnail = $product->thumbnail;

        $product->name = $request->name;
        $product->description = $request->description;
        $product->content = $request->content;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->category_id = $request->category_id;

        if(!empty($request->file)){
            $image = $request->file('file');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images'),$imageName);
            $product->thumbnail = $imageName;
        }

        try {
            $product->save();
            if(!empty($image)){
                Storage::delete(public_path('images/'.$oldThumbnail.''));
            }
            return redirect()->route('index.product')->with('success','Cập nhật thành công');
        } catch (\Exception $err) {
            return redirect()->back()
            ->with('error','Cập nhật thất bại')
            ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
