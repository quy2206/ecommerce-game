<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use Illuminate\Http\Request;
use App\Http\Services\MenuService;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
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
        $this->folderThumb = config('common.folder_product_thumb_upload');
        $this->folderImage = config('common.folder_product_img_upload');
    }
    public function index(Request $request)
    {


        $products= Product::leftJoin('categories','categories.id','=','products.category_id')
        ->select('products.*','categories.name as category_name');
        $categories = Category::pluck('name', 'id')
            ->toArray();
        $perPage = $request->get('per_page');


        if (!empty($request->keyword)) {
            $products = Product::where('products.name', 'like', '%' . $request->keyword . '%');

        }

        // Search category_id
        if (!empty($request->category_id) && is_array($request->category_id)) {
            $products = Product::whereIn('products.category_id', $request->category_id);
        }
        // Check if have Search with Price
        if (!empty($request->get('price')) && is_array($request->get('price'))) {
            foreach ($request->get('price') as $key => $value) {
                switch ($value) {
                    case 1:
                        if ($key == 0)
                            $products->where('products.price', '<', 99000);
                        else
                            $products->orWhere('products.price', '<', 99000);
                        break;
                    case 2:
                        if ($key == 0)
                            $products->whereBetween('products.price', [100000, 199000]);
                        else
                            $products->orWhereBetween('products.price', [100000, 199000]);
                        break;
                    case 3:
                        if ($key == 0)
                            $products->whereBetween('products.price', [200000, 299000]);
                        else
                            $products->orWhereBetween('products.price', [200000, 299000]);
                        break;
                    default:
                        if ($key == 0)
                            $products->where('products.price', '<', 500000);
                        else
                            $products->orWhere('products.price', '<', 500000);
                        break;
                }
            }
        }

        $products = $products->paginate($perPage);

        return view('admin.products.index', [
            'title' => 'Product Manager',
            'products' => $products,
            'categories' => $categories
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
            'cate' => $cate
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
        return view('admin.products.edit', [

            'products' => $products,
            'categories' => $categories
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

        if (!empty($request->file)) {
            $image = $request->file('file');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
            $product->thumbnail = $imageName;
        }

        try {
            $product->save();
            if (!empty($image)) {
                Storage::delete(public_path('images/' . $oldThumbnail . ''));
            }
            return redirect()->route('index.product')->with('success', 'Cập nhật thành công');
        } catch (\Exception $err) {
            return redirect()->back()
                ->with('error', 'Cập nhật thất bại')
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $product = Product::findOrFail($request->input())->first();

        $result = $product->delete();
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa sản phẩm thành công'
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => 'Xóa sản phẩm không thành công'
        ]);
    }
}
