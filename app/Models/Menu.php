<?php

namespace App\Models;

use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu';
    protected $primaryKey = 'id_menu';
    protected $guarded = ['id_menu'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_category',
        'menu_name',
        'menu_description',
        'menu_price',
        'photo_url'
    ];

    public function orderDetails() {
        return $this->hasMany(OrderDetail::class, 'id_product', 'id_menu');
    } 
}
