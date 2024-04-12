<?php

namespace App\Controller\Admin;

use App\Entity\MentionsLegales;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;


class MentionsLegalesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MentionsLegales::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextEditorField::new('content'),
        ];
    }
}
