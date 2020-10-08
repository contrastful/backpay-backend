<?php

namespace App\Controller\Admin;

use App\Entity\Area;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class AreaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Area::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            TextField::new('slug'),
            TextField::new('latitude')->hideOnIndex(),
            TextField::new('longitude')->hideOnIndex(),
            NumberField::new('defaultZoomLevel'),
            NumberField::new('maxZoomLevel')
        ];
    }
}
