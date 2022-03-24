<?php

namespace App\Http\Services ;

use App\Models\Category;
use Illuminate\Contracts\Session\Session;

class MenuService{
    public function create($request){
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
}
