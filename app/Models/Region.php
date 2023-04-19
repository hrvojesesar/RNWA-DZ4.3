<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = 'region';

    protected $primaryKey = 'RegionID';

    public $timestamps = false;

    protected $fillable = [
        'RegionID',
        'RegionDescription'
    ];



      public function territories()
        {
            return $this->hasMany(Territory::class);
        }
    use HasFactory;
}
