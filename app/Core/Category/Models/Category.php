<?php

namespace App\Core\Category\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'email', 'password',
    ];
}
