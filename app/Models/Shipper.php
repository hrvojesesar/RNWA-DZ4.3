<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipper extends Model
{
    protected $table = 'shippers';

    protected $primaryKey = 'ShipperID';
    public $timestamps = false;
    protected $fillable = [
        'ShipperID',
        'CompanyName',
        'Phone'
    ];


    /*public function orders()
    {
        return $this->hasMany(Order::class);
    }

    */
    	

    use HasFactory;

}
