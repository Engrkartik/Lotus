<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shift_break extends Model
{
    use HasFactory;
    public $timestamps=true;
    protected $table='break';
}
