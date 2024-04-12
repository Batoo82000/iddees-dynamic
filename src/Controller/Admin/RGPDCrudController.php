<?php

namespace App\Controller\Admin;

use App\Entity\RGPD;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;


class RGPDCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return RGPD::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextEditorField::new('content'),
        ];
    }
}
