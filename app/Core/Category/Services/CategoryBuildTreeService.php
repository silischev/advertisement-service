<?php

namespace App\Core\Category\Services;

class CategoryBuildTreeService
{
    /**
     * Return an array of ancestors sorted in ascending order
     *
     * @param int $categoryId
     * @param array $categories
     *
     * @return array
     */
    public function getAncestors(int $categoryId, array $categories)
    {
        $ancestors = [];
        $currentCategory = $categories[$categoryId];
        $level = $currentCategory['level'];

        $ancestors[$level] = $currentCategory;

        while (!empty($level)) {
            $parent = $categories[$currentCategory['parent_id']];
            $level = $parent['level'];
            $ancestors[$level] = $parent;
            $currentCategory = $parent;
        }

        ksort($ancestors);

        return $ancestors;
    }

    /**
     * Get categories sorted by level and parent
     * Example:
     *      '1' => ['name' => 'A', 'level' => 0], // Parent for B, C
     *      '2' => ['name' => 'B', 'level' => 1],
     *      '3' => ['name' => 'C', 'level' => 1],
     *      '4' => ['name' => 'D', 'level' => 0], // Parent
     *
     * @param array $allCategories
     *
     * @return array
     */
    public function getAsSortedTree(array $allCategories)
    {
        $sortedCategories = [];

        foreach ($allCategories as $category) {
            if (empty($category['parent_id'])) {
                $sortedCategories[$category['id']] = $this->setLeaf($category['id'], $category['name']);
                $this->addBranch($category['id'], 0, $sortedCategories, $allCategories);
            }
        }

        return $sortedCategories;
    }

    /**
     * @param int $parentId
     * @param int $level
     * @param array $sortedCategories
     */
    private function addBranch(int $parentId, int $level, array &$sortedCategories, array $allCategories)
    {
        $childCategories = $this->getChild($parentId, $allCategories);

        if (count($childCategories) > 0) {
            $level++;
            foreach ($childCategories as $category) {
                $sortedCategories[$category['id']] = $this->setLeaf($category['id'], $category['name'], $category['parent_id'], $level);
                $this->addBranch($category['id'], $level, $sortedCategories, $allCategories);
            }
        }
    }

    /**
     * @param int $parentId
     * @param array $categories
     *
     * @return array
     */
    private function getChild(int $parentId, array $categories)
    {
        $childCategories = [];

        foreach ($categories as $category) {
            if ($category['parent_id'] === $parentId) {
                $childCategories[] = $category;
            }
        }

        return $childCategories;
    }

    /**
     * @param int $id
     * @param string $name
     * @param int $parentId
     * @param int $level
     *
     * @return array
     */
    private function setLeaf(int $id, string $name, int $parentId = 0, int $level = 0)
    {
        return [
            'id' => $id,
            'name' => $name,
            'level' => $level,
            'parent_id' => $parentId,
        ];
    }
}
