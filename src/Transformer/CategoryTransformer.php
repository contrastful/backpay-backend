<?php

use App\Entity\Category;

class CategoryTransformer {
    public static function preview(Category $category) {
        return [
            'id' => $category->getId(),
            'slug' => $category->getSlug(),
            'title' => $category->getTitle(),
            'icon' => $category->getIcon()
        ];
    }
}