<?php

namespace App\Controller\Admin;

use App\Entity\AuteursBlogs;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AuteursBlogsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AuteursBlogs::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nom')->setRequired(true),
            TextField::new('prenom')->setRequired(true),
        ];
    }

}
