<div class="modal fade bd-example-modal-xl" id="show_order_detail" tabindex="-1" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Order Infomation</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="">
                    <table class="table table-bordered table-striped">
                        <thead class="bg-info">
                            <tr>
                                <th>#</th>
                                <th>Thumbnail</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Money</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalMoney = 0;
                                $totalQuantity = 0;
                            @endphp
                            @foreach ($order->orderDetails as $key => $orderDetail)
                                @php
                                    $money = $orderDetail->quantity * $orderDetail->price;
                                    $totalMoney += $money;

                                    $quantity = $orderDetail->quantity;
                                    $totalQuantity += $quantity;

                                    $price = $orderDetail->price;
                                @endphp
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td><img src="/product_upload/product_thumbnail/{{ $orderDetail->product->thumbnail }}"
                                            alt="{{ $orderDetail->product->name }}" class="img-fluid img-thumbnail">
                                    </td>
                                    <td>{{ number_format($quantity) }}</td>
                                    <td>{{ number_format($price) }}</td>
                                    <td>{{ formatPrice($money) }}</td>
                                </tr>
                            @endforeach
                        <tfoot class="bg-secondary">
                            <tr>
                                <td colspan="2" class="text-right">Total Quantity</td>
                                <td class="text-bold">{{ number_format($totalQuantity) }}</td>
                                <td class="text-right">Total Money</td>
                                <td class="text-bold">{{ formatPrice($totalMoney) }}</td>
                            </tr>
                        </tfoot>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                {{-- <a type="button" href="{{ route('edit.product', $pro->id) }}" class="btn btn-info btn-common"
                    title=""><i class="fas fa-edit"></i>Edit</a> --}}
            </div>
        </div>
    </div>
</div>
