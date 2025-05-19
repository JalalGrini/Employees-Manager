<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class logs extends Model
{
    protected $fillable = ['user_id', 'action', 'details', 'status'];
    use HasFactory;
}
