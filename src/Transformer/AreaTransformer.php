<?php

use App\Entity\Area;

class AreaTransformer {
    public static function preview(Area $area) {
        return [
            'id' => $area->getId(),
            'slug' => $area->getSlug(),
            'name' => $area->getName(),
            'latitude' => (double) $area->getLatitude(),
            'longitude' => (double) $area->getLongitude(),
            'defaultZoomLevel' => (int) $area->getDefaultZoomLevel(),
            'minZoomLevel' => (int) $area->getMaxZoomLevel()
        ];
    }
}