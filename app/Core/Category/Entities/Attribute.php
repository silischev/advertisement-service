<?php

namespace App\Core\Category\Entities;

abstract class Attribute
{
    const TYPE_TEXT = 'text';
    const TYPE_LIST = 'list';
    const TYPE_IMAGE = 'image';

    /**
     * @var string
     */
    private $label;

    /**
     * @var array
     */
    private $value;

    /**
     * @var array
     */
    private $metadata;

    abstract protected function setType(string $type);

}
