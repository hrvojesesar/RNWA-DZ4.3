<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerDemographic extends Model
{
    protected $table = 'customerdemographics';

    protected $primaryKey = 'CustomerTypeID';

    public $timestamps = false;

    protected $fillable = [
        'CustomerTypeID',
        'CustomerDesc'
    ];


    /*
      public function territories()
        {
            return $this->hasMany(Territory::class);
        }

    */    

    use HasFactory;
}
