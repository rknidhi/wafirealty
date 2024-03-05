<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreateOwnProperty extends Model
{
    use HasFactory;
    protected $table = 'ownerownlist';
    public $timestamps = false;
}
