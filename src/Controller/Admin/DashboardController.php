<?php

namespace App\Controller\Admin;

use App\Entity\Area;
use App\Entity\Category;
use App\Entity\Image;
use App\Entity\Perk;
use App\Entity\Place;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(CrudUrlGenerator::class)->build();

        return $this->redirect($routeBuilder->setController(PlaceCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Backpay Backend');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToCrud('Places', null, Place::class);
        yield MenuItem::linkToCrud('Perks', null, Perk::class);
        yield MenuItem::linkToCrud('Images', null, Image::class);
        yield MenuItem::linkToCrud('Categories', null, Category::class);
        yield MenuItem::linkToCrud('Areas', null, Area::class);
    }
}
