<?php

namespace App\Core\Category\Models;

use App\Core\Category\Entities\Text;
use App\Core\Category\Entities\VariantsList;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    public $timestamps = false;

    /**
     * @return array
     */
    public static function getTypes()
    {
        return [
            Text::TYPE => 'Текстовое поле',
            VariantsList::TYPE => 'Список',
        ];
    }
}
