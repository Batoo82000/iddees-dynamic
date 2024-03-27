<?php

namespace App\Controller\Admin;

use App\Entity\Organigramme;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class OrganigrammeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Organigramme::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nom'),
            TextField::new('prenom'),
            ImageField::new('photo')
                ->setBasePath("assets/img/organigramme")
                ->setUploadDir('/public/assets/img/organigramme')
                ->setUploadedFileNamePattern("[name]-[timestamp].[extension]"),
            AssociationField::new('roleOrganigramme'),
            AssociationField::new('localisationSites'),
        ];
    }

}
