<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';

    protected $primaryKey = 'SupplierID';

    protected $fillable = [
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
        'HomePage'
    ];

    protected $casts = [
        'SupplierID' => 'integer',
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
        'HomePage' => 'string'
    ];


    public $timestamps = true;

    public $incrementing = true;

    public function products()
    {
        return $this->hasMany(Product::class, 'SupplierID', 'SupplierID');
    }



    use HasFactory;
}
