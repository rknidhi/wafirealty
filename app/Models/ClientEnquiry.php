<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientEnquiry extends Model
{
    use HasFactory;
    protected $table = 'clientenquiry';
    public $timestamps = false;
}
