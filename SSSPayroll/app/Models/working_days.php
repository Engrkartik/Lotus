<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class working_days extends Model
{
    use HasFactory;
    public $timestamps=true;
    protected $table='working_day';
}
