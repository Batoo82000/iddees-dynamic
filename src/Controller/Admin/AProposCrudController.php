<?php

namespace App\Controller\Admin;

use App\Entity\APropos;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class AProposCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return APropos::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextEditorField::new('content')->setRequired(true),
        ];
    }

}
