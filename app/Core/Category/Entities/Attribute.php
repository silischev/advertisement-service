<?php

namespace App\Core\Category\Entities;

abstract class Attribute
{
    /**
     * @var string
     */
    protected $value;

    /**
     * @var string
     */
    protected $viewPath;

    /**
     * @var array
     */
    protected $options;

    protected function getView(): string
    {
        return str_replace('.', '/', $this->viewPath);
    }

    protected function setOptions()
    {
        $this->options = [
            'view' => $this->viewPath,
            'value' => $this->value,
        ];
    }
}
