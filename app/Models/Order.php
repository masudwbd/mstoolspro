<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
    {   protected $fillable = [
        'user_id',
        'tool_id',
        'session_id',
        'tool_name',
        'tool_price',
        'date',
        'status',
    ];
}
