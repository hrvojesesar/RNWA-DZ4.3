<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeTerritory extends Model
{
    protected $table = 'employeeterritories';

    protected $primaryKey = ['EmployeeID', 'TerritoryID'];

    protected $fillable = [
        'EmployeeID',
        'TerritoryID',
    ];

    protected $casts = [
        'EmployeeID' => 'int',
        'TerritoryID' => 'string',
    ];


    public $timestamps = false;

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'EmployeeID', 'EmployeeID');
    }

    public function territory()
    {
        return $this->belongsTo(Territory::class, 'TerritoryID', 'TerritoryID');
    }

    use HasFactory;
}
