<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Place;
use App\Entity\User;
use CategoryTransformer;
use PlaceTransformer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api")
 */
class ApiController extends AbstractController
{
    /**
     * @Route("/categories", name="categories")
     */
    public function getCategories()
    {
        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository(Category::class)->findAll();

        return $this->json([
            'categories' => array_map(function($category) {
                return CategoryTransformer::preview($category);
            }, $categories)
        ]);
    }

    /**
     * @Route("/places", name="places")
     */
    public function getPlaces(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $places = $em->getRepository(Place::class)->findApproved(null, null, $request->query->get('areaSlug', null));

        return $this->json([
            'places' => array_map(function($place) {
                return PlaceTransformer::preview($place);
            }, $places)
        ]);
    }

    /**
     * @Route("/place_detail/{placeId}", name="placeDetail")
     */
    public function getPlaceDetail(int $placeId)
    {
        $em = $this->getDoctrine()->getManager();

        $place = $em->getRepository(Place::class)->find($placeId);

        return $this->json([
            'place' => PlaceTransformer::detail($place)
        ]);
    }
}
