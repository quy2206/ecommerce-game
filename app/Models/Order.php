<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'orders';
    /**
     * Define variable STATUS
     * 0: đã tạo đơn hàng và chưa thanh toán
     * 1: đã tạo đơn và đã thanh toán online
     * 2: (shipping) shipper đang đi giao hàng
     * 3: (cancel) đơn hàng bị hủy do lỗi kỹ thuật hoặc một lý do khác
     * 4: (finished) Hoàn thành
     */
    public const STATUS = [
        0,
        1,
        2,
        3,
        4,
    ];
    protected $fillable = [
        'user_id',
        'payment_method_id',
        'code',
        'fullname',
        'email',
        'phone',
        'address',
        'shipping_method',
        'shipping_fee',
        'status',
        'comment',
        'order_date',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }
    public function getTotalQuantityAttribute($value)
    {
        // Format value and Return
        return number_format($value);
    }

    public function getTotalMoneyAttribute($value)
    {
        // Format value and Return
        return number_format($value, 2) . ' ' . 'VND';
    }
    public function getStatusNameAttribute()
    {
        // Get value of STATUS
        $status = $this->status;

        // Process to get name of STATUS
        $statusName = null;

        // Process value of STATUS
        switch($status) {
            case 0:
                $statusName = 'payment unpaid';
                break;
            case 1:
                $statusName = 'payment online';
                break;
            case 2:
                $statusName = 'shipping';
                break;
            case 3:
                $statusName = 'cancel';
                break;
            case 4:
                $statusName = 'complete';
                break;
            default:
                break;
        }

        // Return
        return $statusName;


    }
}
