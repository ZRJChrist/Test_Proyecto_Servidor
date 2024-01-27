<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;
    protected $table = 'tasks';

    protected $fillable = [
        'operator_id',
        'customer_id',
        'contact_name',
        'contact_phone',
        'email',
        'title',
        'description',
        'address',
        'city',
        'postal_code',
        'province_id',
        'status_id',
        'scheduled_at',
        'pre_notes',
    ];
}
