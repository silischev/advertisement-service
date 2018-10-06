<?php

namespace App\Core\Category\Entities;

class Text extends Attribute
{
    const TYPE = 'text';
    const VIEW_PATH = 'attributes.text.basic';

    public function __construct(string $viewPath = self::VIEW_PATH)
    {
        $this->viewPath = $viewPath;
    }

    protected function setOptions()
    {
        parent::setOptions();
    }
}
