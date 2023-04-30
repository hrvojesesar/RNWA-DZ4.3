<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{

    protected $table = 'order details';

    protected $primaryKey = ['OrderID', 'ProductID'];

    public $incrementing = false;

    protected $fillable = [
        'OrderID',
        'ProductID',
        'UnitPrice',
        'Quantity',
        'Discount'
    ];

    protected $casts = [
        'OrderID' => 'int',
        'ProductID' => 'int',
        'UnitPrice' => 'float',
        'Quantity' => 'int',
        'Discount' => 'float'
    ];


public function order()
{
    return $this->belongsTo(Order::class, 'OrderID', 'OrderID');
}

public function product()
{
    return $this->belongsTo(Product::class, 'ProductID', 'ProductID');
}
    use HasFactory;
}
