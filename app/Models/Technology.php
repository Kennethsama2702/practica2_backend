<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'level',
        'category',
        'color',
        'order',
    ];

    protected $casts = [
        'level' => 'integer',
        'order' => 'integer',
    ];
}