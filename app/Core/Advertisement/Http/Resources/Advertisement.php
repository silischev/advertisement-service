<?php

namespace App\Core\Advertisement\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Advertisement extends Resource
{
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'price' => $this->price,
        ];
    }
}
