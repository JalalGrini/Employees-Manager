<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'employee_id',
        'processed_by',
        'document_title',
        'employee_name',
        'description',
        'status',
        'rejection_reason',
        'processed_at'
    ];
    use HasFactory;
}
