<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Place;
use CategoryTransformer;
use PlaceTransformer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
    public function getPlaces()
    {
        $em = $this->getDoctrine()->getManager();

        $places = $em->getRepository(Place::class)->findApproved();

        return $this->json([
            'places' => array_map(function($place) {
                return PlaceTransformer::preview($place);
            }, $places)
        ]);
    }
}
