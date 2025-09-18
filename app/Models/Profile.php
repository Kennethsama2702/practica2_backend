<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'bio',
        'location',
        'email',
        'phone',
        'avatar',
        'github_url',
        'linkedin_url',
        'cv_url',
    ];
}