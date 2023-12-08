<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projets';
    public $timestamps = false;
    protected $fillable = [
        'location',
        'type',
        'builder',
        'project_name',
        'price'
    ];
}
