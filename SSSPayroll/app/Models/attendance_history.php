<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attendance_history extends Model
{
    use HasFactory;
    public $timestamps=true;
    protected $table='bulk_update_history';
}
