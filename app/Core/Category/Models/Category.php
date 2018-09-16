<?php

namespace App\Core\Category\Models;

use App\Core\Advertisement\Models\Advertisement;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    public function advertisements()
    {
        return $this->hasMany(Advertisement::class);
    }
}
