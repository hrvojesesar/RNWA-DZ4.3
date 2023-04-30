<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Territory extends Model
{
    protected $table = 'territories';

    protected $primaryKey = 'TerritoryID';
    public $timestamps = false;
    protected $fillable = [
        'TerritoryID',
        'TerritoryDescription',
        'RegionID'
    ];

    protected $casts = [
        'TerritoryID' => 'string',
        'TerritoryDescription' => 'string',
        'RegionID' => 'integer'
    ];


    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function employeeTerritories()
    {
        return $this->hasMany(EmployeeTerritory::class, 'TerritoryID', 'TerritoryID');
    }


    use HasFactory;

}
