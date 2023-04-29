<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    protected $primaryKey = 'CustomerID';

    protected $fillable = [
        'CustomerID',
        'CompanyName',
        'ContactName',
        'ContactTitle',
        'Address',
        'City',
        'Region',
        'PostalCode',
        'Country',
        'Phone',
        'Fax',
    ];

    protected $casts = [
        'CustomerID' => 'string',
        'CompanyName' => 'string',
        'ContactName' => 'string',
        'ContactTitle' => 'string',
        'Address' => 'string',
        'City' => 'string',
        'Region' => 'string',
        'PostalCode' => 'string',
        'Country' => 'string',
        'Phone' => 'string',
        'Fax' => 'string',
    ];

    public $timestamps = false;

    public function orders()
    {
        return $this->hasMany(Order::class, 'CustomerID', 'CustomerID');
    }

    public function customerdemographics()
    {
        return $this->belongsToMany(CustomerDemographic::class, 'customer_customer_demo', 'CustomerID', 'CustomerTypeID');
    }

    use HasFactory;
}
