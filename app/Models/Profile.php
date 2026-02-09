<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'bio',
        'user_id',
        'name',
        'email',
        'phone',
    ];
}
