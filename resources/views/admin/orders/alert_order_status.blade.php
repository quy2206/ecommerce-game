@if (empty($order->status) || $order->status == \App\Models\Order::STATUS[0])
    <div class="text-primary">payment unpaid</div>
@elseif ($order->status == \App\Models\Order::STATUS[1])
    <div class="text-secondary">payment online</div>
@elseif ($order->status == \App\Models\Order::STATUS[2])
    <div class="text-info">Shipping</div>
@elseif ($order->status == \App\Models\Order::STATUS[3])
    <div class="text-danger">Cancel</div>
@else
    <div class="text-success">Complete</div>
@endif
