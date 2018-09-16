<?php

namespace App\Core\Advertisement\Models;

use App\Core\Category\Models\Category;
use App\Core\User\Models\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Advertisement
 *
 * @package App\Core\Advertisement\Models
 *
 * @property string title
 * @property string description
 * @property int    price
 * @property int    views
 * @property int    visitors
 * @property string images
 * @property string address
 * @property string phone
 * @property int    user_id
 * @property int    category_id
 * @property string published
 * @property string archived
 * @property string cancelled
 * @property string cancel_date
 * @property string archive_date
 * @property string created_at
 * @property string updated_at
 */
class Advertisement extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
