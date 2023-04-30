<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';

    protected $primaryKey = 'EmployeeID';

    protected $fillable = [
        'LastName',
        'FirstName',
        'Title',
        'TitleOfCourtesy',
        'BirthDate',
        'HireDate',
        'Address',
        'City',
        'Region',
        'PostalCode',
        'Country',
        'HomePhone',
        'Extension',
        'Photo',
        'Notes',
        'ReportsTo',
        'PhotoPath',
        'Salary',
    ];

    public $timestamps = false;

    protected $casts = [
        'EmployeeID' => 'int',
        'LastName' => 'string',
        'FirstName' => 'string',
        'Title' => 'string',
        'TitleOfCourtesy' => 'string',
        'BirthDate' => 'date',
        'HireDate' => 'date',
        'Address' => 'string',
        'City' => 'string',
        'Region' => 'string',
        'PostalCode' => 'string',
        'Country' => 'string',
        'HomePhone' => 'string',
        'Extension' => 'string',
        'Photo' => 'string',
        'Notes' => 'string',
        'ReportsTo' => 'int',
        'PhotoPath' => 'string',
        'Salary'=> 'int',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'EmployeeID', 'EmployeeID');
    }

    public function territories()
    {
        return $this->belongsToMany(Territory::class, 'employeeterritories', 'EmployeeID', 'TerritoryID');
    }
    public function employees()
    {
        return $this->hasMany(Employee::class, 'ReportsTo', 'EmployeeID');
    }

    use HasFactory;
}
