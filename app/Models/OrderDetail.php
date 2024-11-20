<?php

namespace App\Models;

use App\Models\Menu;
use App\Models\Orders;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'order_detail';
    protected $guarded = ['id'];
    protected $fillable = [
        'id_order',
        'id_product',
        'quantity',
        'price'
    ];

    public function menu() {
        return $this->belongsTo(Menu::class, 'id_product', 'id_menu');
    }

    public function order() {
        return $this->belongTo(Orders::class, 'id_order', 'id');
    }
}
