<?php

namespace App\Core\Category\Services;

class CategoryBuildTreeService
{
    /**
     * @var array
     */
    private $allCategories;

    public function __construct(array $allCategories)
    {
        $this->allCategories = $allCategories;
    }

    /**
     * Get categories sorted by level and parent
     * Example:
     *      '1' => ['name' => 'A', 'level' => 0], // Parent for B, C
     *      '2' => ['name' => 'B', 'level' => 1],
     *      '3' => ['name' => 'C', 'level' => 1],
     *      '4' => ['name' => 'D', 'level' => 0], // Parent
     *
     * @return array
     */
    public function getAsSortedTree()
    {
        $sortedCategories = [];

        foreach ($this->allCategories as $category) {
            if (empty($category['parent_id'])) {
                $sortedCategories[$category['id']] = $this->setLeaf($category['name']);
                $this->addBranch($category['id'], 0, $sortedCategories);
            }
        }

        return $sortedCategories;
    }

    /**
     * @param int $parentId
     * @param int $level
     * @param array $sortedCategories
     */
    private function addBranch(int $parentId, int $level, array &$sortedCategories)
    {
        $childCategories = $this->getChild($parentId);

        if (count($childCategories) > 0) {
            $level++;
            foreach ($childCategories as $category) {
                $sortedCategories[$category['id']] = $this->setLeaf($category['name'], $level);
                $this->addBranch($category['id'], $level, $sortedCategories);
            }
        }
    }

    /**
     * @param int $parentId
     *
     * @return array
     */
    private function getChild(int $parentId)
    {
        $childCategories = [];

        foreach ($this->allCategories as $category) {
            if ($category['parent_id'] === $parentId) {
                $childCategories[] = $category;
            }
        }

        return $childCategories;
    }

    private function setLeaf(string $name, int $level = 0)
    {
        return [
            'name' => $name,
            'level' => $level,
        ];
    }
}
