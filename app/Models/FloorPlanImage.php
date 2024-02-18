<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FloorPlanImage extends Model
{
    use HasFactory;
    protected $table = 'floorimages';
    public $timestamps = false;
}
