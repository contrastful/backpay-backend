<?php

namespace App\Transformer;

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
            'about' => $place->getAbout(),
            'coverImage' => $place->getCoverImage() ? $place->getCoverImage()->getSource() : null,
            'perks' => $place->getPerks() ? array_map(function ($perk) {
                return [
                    'id' => $perk->getId(),
                    'icon' => $perk->getIcon(),
                    'description' => $perk->getDescription(),
                ];
            }, $place->getPerks()->toArray()) : null,
            'images' => array_map(function ($image) {
                return [
                    'id' => $image->getId(),
                    'source' => $image->getSource(),
                    'label' => $image->getLabel()
                ];
            }, $place->getImages()->toArray()),
            'instagram' => $place->getInstagramLink(),
            'facebook' => $place->getFacebookLink(),
            'googleMaps' => $place->getGoogleMapsLink(),
            'recommendedBy' => $place->getSuggestionName()
        ];
    }
}