<?php

namespace App\Models;

use App\Models\User;
use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $guarded = ['id'];
    protected $fillable = [
        'id_user',
        'total_amount',
        'status',
        'snap_token'
    ];

    public function details() {
        return $this->hasMany(OrderDetail::class, 'id_order', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
