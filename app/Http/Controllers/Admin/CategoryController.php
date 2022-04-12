<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\MenuService;
use App\Models\Category;
use PhpParser\Node\Stmt\Catch_;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $MenuService;
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }
    public function index(Request $request)
    {
        $categories = Category::select('*');
        if ($request->has('view_deleted')) {
            $categories = $categories->onlyTrashed();
        }
        $categories =  $categories->paginate(10);
        return view('admin.category.index',[
            'categories'=>$categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create',[
            'tittle'=>'Add Category'
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

        $result = $this->menuService->create($request);
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
    public function edit($id)
    {
        $categories = Category::findOrFail($id);

        return view('admin.category.edit',[
            'category'=>$categories
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
        try {
            $categories = Category::findOrFail($id);
            $categories->name= $request->name;
            $categories->save();
            return redirect()->route('index.category')->with('success','Cập nhật danh mục thành công');
        } catch (\Exception $err) {
            return redirect()->back()->with('error',$err->getMessage());
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

        $categories = Category::where('id', $request->input('id'))->first();

        $result=$categories->delete();
        if($result){
            return response()->json([
                'error'=> false,
                'message' => 'Xóa thành công'
            ]);
        } return response()->json([
            'error'=> true,
            'message' => 'Xóa không thành công'
        ]);

    }
    public function restore($id)
    {
        Category::withTrashed()->find($id)->restore();

        return back();
    }
    public function restoreAll()
    {
        Category::onlyTrashed()->restore();

        return back();
    }
}
