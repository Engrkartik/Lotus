<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class holiday_list extends Model
{
    use HasFactory;
    public $timestamps=true;
    protected $table='holiday_list';
}
