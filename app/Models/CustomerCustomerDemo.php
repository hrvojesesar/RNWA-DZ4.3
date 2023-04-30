<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerCustomerDemo extends Model
{
    protected $table = 'customercustomerdemo';

    protected $primaryKey = ['CustomerID', 'CustomerTypeID'];

    protected $fillable = [
        'CustomerID',
        'CustomerTypeID',
    ];

    public $timestamps = false;

    protected $casts = [
        'CustomerID' => 'string',
        'CustomerTypeID' => 'string',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'CustomerID', 'CustomerID');
    }

   public function customerDemographic()
    {
        return $this->belongsTo(CustomerDemographic::class, 'CustomerTypeID', 'CustomerTypeID');
    }

    use HasFactory;
}
