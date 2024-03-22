<?php

namespace App\Controller\Admin;

use App\Entity\SitesIddees;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SitesIddeesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SitesIddees::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nom'),
            TextField::new('mentionSpeciale'),
            TextareaField::new('carte'),
            ImageField::new('photo')
                ->setBasePath('assets/img/wites')
                ->setUploadDir('/public/assets/img/sites')
                ->setUploadedFileNamePattern('[name]-[timestamp].[extension]')
                ->setFormTypeOptions(['attr'=>[
                    'accept'=>"image/x-png,image/gif,image/jpeg,image/jpg,image/webp"
                ]]),
            TextField::new('adresse'),
            NumberField::new('codePostal'),
            TextField::new('ville'),
            NumberField::new('telephone'),
            EmailField::new('email'),
            TextEditorField::new('description'),
        ];
    }

}