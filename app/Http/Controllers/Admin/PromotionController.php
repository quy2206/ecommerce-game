<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $per_page = $request->get('perpage',10);
        $promotions = Promotion::select('promotions.*');

        //
        // Search Promotion Code
        if (!empty($request->code)) {
            $promotions = Promotion::where('code', 'like', '%' . $request->code . '%');
        }
         // Search Promotion Discount
         if (!empty($request->discount)) {
            $promotions = Promotion::where('discount', 'like', '%' . $request->discount . '%');
        }
         // Search Promotion Begin Date
         if (!empty($request->begin_date)) {
            $promotions = Promotion::where('discount', 'like', '%' . $request->discount . '%');
        }
        $promotions = $promotions->paginate($per_page);

        return view('admin.promotion.index',[
            'promotions'=>$promotions,
            'title'=> 'Promotion Manager'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.promotion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            Promotion::create([
                'code'=>$request->code,
                'type'=>$request->type,
                'discount'=>$request->discount,
                'begin_date'=>$request->begin_date,
                'end_date'=>$request->end_date,
                'quantity'=>$request->quantity,
                'status'=>$request->status,
            ]);
            $request->session()->flash('success', 'Tạo Promotion thành công');
        } catch (\Exception $err) {
            $request->session()->flash('error','Tạo Promotion thất bại');
        }
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
        //
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

        $promotion = Promotion::findOrFail($id);
        $promotion->code = $request->code;
        $promotion->discount = $request->discount;
        $promotion->type = $request->type;
        $promotion->begin_date = date('Y-m-d 00:00:00', strtotime($request->begin_date));
        $promotion->end_date = date('Y-m-d 23:59:59', strtotime($request->end_date));
        $promotion->quantity = $request->quantity;
        $promotion->status = $request->status;
        try {
            // Commit update data for table promotions
            $promotion->save();

            // success
            return redirect()->back()->with('success', 'Update Promotion successful!');
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
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
        $promotion = Promotion::findOrFail($request->input())->first();

        $result = $promotion->delete();
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa khuyến mãi thành công'
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => 'Xóa khuyến mãi không thành công'
        ]);
    }
}
