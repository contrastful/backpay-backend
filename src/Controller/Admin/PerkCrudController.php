<?php

namespace App\Controller\Admin;

use App\Entity\Perk;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PerkCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Perk::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
