<?php

use App\Entity\Place;

class PlaceTransformer {
    public static function preview(Place $place) {
        return [
            'id' => $place->getId(),
            'title' => $place->getTitle(),
            'subtitle' => $place->getSubtitle(),
            'latitude' => (double) $place->getLatitude(),
            'longitude' => (double) $place->getLongitude(),
            'categoryId' => $place->getCategory()->getId(),
            'icon' => $place->getCategory()->getIcon()
        ];
    }

    public static function detail(Place $place) {
        $category = $place->getCategory();

        return [
            'id' => $place->getId(),
            'title' => $place->getTitle(),
            'subtitle' => $place->getSubtitle(),
            'latitude' => (double) $place->getLatitude(),
            'longitude' => (double) $place->getLongitude(),
            'category' => [
                'id' => $category->getId(),
                'title' => $category->getTitle(),
                'icon' => $category->getIcon(),
            ],
            'about' => $place->getAbout()
        ];
    }
}