<?php

namespace App\Core\Category\Dto;

class AttributeDto
{
    /**
     * @var string
     */
    private $view;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $title;

    /**
     * @var array
     */
    private $variants;

    /**
     * AttributeDto constructor.
     *
     * @param string $view
     * @param string $name
     * @param string $title
     * @param array $variants
     */
    public function __construct(string $view, string $name, string $title, array $variants = [])
    {
        $this->view = $view;
        $this->name = $name;
        $this->title = $title;
        $this->variants = $variants;
    }

    /**
     * @return string
     */
    public function getView(): string
    {
        return $this->view;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return array
     */
    public function getVariants(): array
    {
        return $this->variants;
    }
}