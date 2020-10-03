<?php

namespace App\Controller\Admin;

use App\Entity\Place;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;

class PlaceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Place::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title'),
            TextField::new('subtitle')->hideOnIndex(),
            AssociationField::new('area'),
            TextareaField::new('about')->hideOnIndex(),
            NumberField::new('latitude')->hideOnIndex(),
            NumberField::new('longitude')->hideOnIndex(),
            AssociationField::new('category'),
            AssociationField::new('perks')->hideOnIndex(),
            NumberField::new('longitude')->hideOnIndex(),
            DateTimeField::new('approvedAt'),
            UrlField::new('coverImage')->hideOnIndex(),
            UrlField::new('googleMapsLink')->hideOnIndex(),
            UrlField::new('instagramLink')->hideOnIndex(),
            UrlField::new('facebookLink')->hideOnIndex(),
            AssociationField::new('images')->hideOnIndex()
        ];
    }
}
