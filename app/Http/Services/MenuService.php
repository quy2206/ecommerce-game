<?php

namespace App\Http\Services ;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Session\Session;

class MenuService{
    public function create($request){
        $request->validate([

            'name'=>'required',
            
        ]);
        try {
            Category::create([
                'name'=> $request-> name
            ]);

            $request->session()->flash('success','Tạo danh mục thành công');
        } catch (\Exception $err) {
            $request->session()->flash('error','Tạo danh mục thất bại');
            return false;
        }
        return true;
    }

    public function getParent(){
        return Category::all();
    }

    public function storefile($request)
    {
        if ($request->hasFile('file')){
            $image = $request->file('file');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images'),$imageName);
        }
    }

    public function storeProduct($request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name'=>'required',
            'thumbnail'=>'required',
            'content'=>'required',
            'category'=>'required'
        ]);
        if ($request->hasFile('file')){
            $thumbnail = $request->file('file');
            $thumbnailName = time().'.'.$thumbnail->extension();
            $thumbnail->move(public_path('product_upload/product_thumbnail'),$thumbnailName);
        }
        try {
            Product::create([
                'name'=> $request->name,
                'category_id'=>$request->category_id,
                'thumbnail'=> $thumbnailName,
                'description'=> $request->description,
                'content'=> $request->content,
                'status'=> $request->status,
                'quantity'=>$request->quantity,
                'price'=>$request->price,
            ]);
            $request->session()->flash('success','Tạo sản phẩm thành công');
        } catch (\Exception $err) {

            $request->session()->flash('success','Tạo sản phẩm thất bại');
        }

    }
}
