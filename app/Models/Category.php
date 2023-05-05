<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $primaryKey = 'CategoryID';

    protected $fillable = [
        'CategoryID',
        'CategoryName',
        'Description',
        'Picture',
    ];

    protected $casts = [
        'CategoryID' => 'integer',
        'CategoryName' => 'string',
        'Description' => 'string',
        'Picture' => 'string',
    ];
    public $timestamps = true;

    public $incrementing = true;

    public function products()
    {
        return $this->hasMany(Product::class, 'CategoryID', 'CategoryID');
    }

    use HasFactory;
}
