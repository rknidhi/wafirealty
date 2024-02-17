<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FloorPlan extends Model
{
    protected $table = 'floorplan';
    public $timestamps = false;
    use HasFactory;
}
