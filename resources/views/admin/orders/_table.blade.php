@if ($orders->isEmpty())
    <p class="red">Not Found Data</p>
@else
    <div class="d-flex justify-content-between">
        <div class="">
            <!-- Set Limit Record in Per Page -->
            <select name="per_page" onChange="submitFilterOrder(this)" class="d-inline-block ml-2 form-control-custom">
                <option value="10" {{ request()->per_page == 10 ? 'selected' : '' }}>10</option>
                <option value="50" {{ request()->per_page == 50 ? 'selected' : '' }}>50</option>
                <option value="100" {{ request()->per_page == 100 ? 'selected' : '' }}>100</option>
                <option value="200" {{ request()->per_page == 200 ? 'selected' : '' }}>200</option>
            </select>&nbsp;
            <label for="">Record per page</label>
        </div>
        <div>
            {{ $orders->appends(request()->input())->links() }}
        </div>
    </div>

    <table id="order-list" class="table table-bordered table-hover ">
        <thead class="bg-success">
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Money</th>
                <th>Status</th>
                <th>Order Date</th>
                <th  colspan="4">Action</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($orders))
                @foreach ($orders as $key => $order)
                    <tr class="tr-order-{{ $order->id }}" data-order-id="{{ $order->id }}"
                        data-full-name="{{ $order->fullname }}" data-total-quantity="{{ $order->total_quantity }}"
                        data-total-money="{{ $order->total_money }}" data-status="{{ $order->status }}">
                        <td class="text-center">{{ $key + 1 }}</td>
                        <td>{{ $order->fullname }}</td>
                        <td>{{ $order->total_quantity }}</td>
                        <td>{{ $order->total_money }}</td>
                        <td class="lbl-order-status">
                            @include('admin.orders.alert_order_status')
                        </td>
                        <td>{{ $order->order_date }}</td>
                        <td>
                            <a href="" data-bs-toggle="modal"  data-bs-target="#show_order_detail" class="btn btn-primary  btn-common"><i class="fas fa-search-plus"></i> Detail</a>
                        </td>
                        <td>
                            @if (in_array($order->status, [\App\Models\Order::STATUS[3], \App\Models\Order::STATUS[4]]))
                                <button type="button" class="btn btn-info btn-common btn-update-order-status"
                                    disabled><i class="far fa-calendar-check"></i> Update Order Status</button>
                            @else
                                <button type="button" onclick="modalOrderStatus(this, '{{ route('update_status.order', $order->id) }}', '{{ $order->status }}')"
                                    class="btn btn-info btn-common btn-update-order-status"><i
                                        class="far fa-calendar-check"></i>Update Order Status</button>
                            @endif
                        </td>
                        <td>
                            @if (in_array($order->status, [\App\Models\Order::STATUS[3], \App\Models\Order::STATUS[4]]))
                                <button type="button" disabled class="btn btn-danger btn-common btn-delete"><i
                                        class="fas fa-trash-alt"></i> Delete</button>
                            @else
                                <form action="">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="deleteRow({{$order->id}},'Order/destroy')"
                                        class="btn btn-danger btn-common btn-delete"><i class="fas fa-trash-alt"></i>
                                        Delete</button>
                                </form>
                            @endif
                        </td>
                        <td>
                            <i class="fas fa-chevron-up cursor"
                                onclick="processOrderDetail(this, {{ $order->id }})"></i>
                        </td>
                    </tr>

                    <tr class="order-detail order-{{ $order->id }}">
                        <td colspan="9">
                            @if ($order->orderDetails)
                                <table class="table table-bordered">
                                    <thead class="bg-secondary">
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Thumbnail</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th colspan="3">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->orderDetails as $keyOD => $orderDetail)
                                            <tr>
                                                <td class="text-center">{{ $keyOD + 1 }}</td>
                                                <td><img src="/product_upload/product_thumbnail/{{$orderDetail->product->thumbnail}}"
                                                        alt="{{ $orderDetail->product->name }}"
                                                        class="img-fluid" style="width: 240px; height: auto;"></td>
                                                <td>{{ $orderDetail->format_quantity }}</td>
                                                <td>{{ $orderDetail->format_price }}</td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>


@endif


