<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class leave extends Model
{
    protected $fillable = [
        'employee_id',
        'employee_name',
        'processed_at',
        'processed_by',
        'leave_reason',
        'start_date',
        'end_date',
        'status',
        'rejected_reason',
    ];
    use HasFactory;
}
