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
     * @var string
     */
    protected $name;

    /**
     * @var array
     */
    protected $options;

    /**
     * Attribute constructor.
     *
     * @param string $viewPath
     */
    public function __construct(string $viewPath)
    {
        $this->viewPath = $viewPath;
    }

    /**
     * @return string
     */
    protected function getView(): string
    {
        return str_replace('.', '/', $this->viewPath);
    }

    protected function setOptions()
    {
        $this->options = [
            'view' => $this->viewPath,
            'name' => $this->name,
            'value' => $this->value,
        ];
    }
}
