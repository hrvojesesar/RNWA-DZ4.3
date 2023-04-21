<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $table = 'orders';

  protected $primaryKey = 'OrderID';

    protected $fillable = [
        'ShipName',
        'ShipAddress',
        'ShipCity',
        'ShipRegion',
        'ShipPostalCode',
        'ShipCountry',
    ];

    public $timestamps = false;

    use HasFactory;
}
