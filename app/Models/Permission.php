<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'permission';
    protected $fillable = ['userid','username','module','view','add','edit','delete','download','fieldedit'];

}
