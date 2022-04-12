<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $per_page = $request->get('per_page', 10);
        $fieldOrder = [
            'orders.id',
            'orders.user_id',
            'orders.fullname',
            'orders.comment',
            'orders.status',
            'orders.order_date',
            'total_quantity',
            'total_money',
        ];
        $orders = Order::select($fieldOrder)
            ->with('orderDetails')
            ->with('orderDetails.product')
            ->leftJoin('users', 'orders.user_id', '=', 'users.id');



        $orders = $orders->leftJoin(
            DB::raw('(SELECT order_id, SUM(quantity) AS total_quantity, SUM(quantity*price) AS total_money
                FROM order_details GROUP BY order_id)
                order_detail_tmp'),
            function ($join) {
                $join->on('orders.id', '=', 'order_detail_tmp.order_id');
            }
        );

         if ($request->from_quantity || $request->to_quantity) {

            $fromQuantity = $request->from_quantity;
            $toQuantity = $request->to_quantity;


            if ($fromQuantity && $toQuantity) {
                $orders = $orders->whereBetween('total_quantity', [$fromQuantity, $toQuantity]);
            } else if ($fromQuantity) {
                $orders = $orders->where('total_quantity', $fromQuantity);
            } else if ($toQuantity) {
                $orders = $orders->where('total_quantity', $toQuantity);
            }

        }


        if ($request->from_money || $request->to_money) {

            $fromMoney = $request->from_money;
            $toMoney = $request->to_money;


            if ($fromMoney && $toMoney) {
                $orders = $orders->whereBetween('total_money', [$fromMoney, $toMoney]);
            } else if ($fromMoney) {
                $orders = $orders->where('total_money', $fromMoney);
            } else if ($toMoney) {
                $orders = $orders->where('total_money', $toMoney);
            }

        }
        if ($request->full_name) {
            $fullName = $request->full_name;
            $orders = $orders->where('fullname', 'like', '%' . $fullName . '%');
        }

        if ($request->status && is_array($request->status)) {
            $orders = $orders->whereIn('orders.status', $request->status);
        }
        $fromOrderDate = $request->from_order_date;
        $toOrderDate = $request->to_order_date;
        if ($fromOrderDate && $toOrderDate) {
            $orders = $orders->whereBetween('orders.order_date', [$fromOrderDate, $toOrderDate]);
        } else if ($fromOrderDate) {
            $orders = $orders->whereDate('orders.order_date', $fromOrderDate);
        } else if ($toOrderDate) {
            $orders = $orders->whereDate('orders.order_date', $toOrderDate);
        }
        $orders = $orders->paginate($per_page);
        return view('admin.orders.index', [
            'title' => 'Order Manager',
            'orders' => $orders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $orders = Order::findOrFail($request->input())->first();

        $result = $orders->delete();
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Delete order success'
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => 'Delete order fail'
        ]);
    }
    public function updateStatus($id, Request $request)
    {
        // Get Order Info
        $order = Order::findOrFail($id);

        try {
            // Set value for field STATUS
            $order->status = $request->status;

            // Save data
            $order->save();

            return response()->json([
                'message' => 'Update order status success',
                'status_name' => $order->status_name,
            ], 200);
        } catch (\Exception $ex) {
            return response()->json([
                'error_message' => $ex->getMessage(),
            ], 500);
        }
    }
}
