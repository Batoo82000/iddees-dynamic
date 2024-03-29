<?php

namespace App\Controller\Admin;

use App\Entity\ImagesBlogs;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ImagesBlogsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ImagesBlogs::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nom'),
            ImageField::new('path')
                ->setBasePath("assets/img/blog")
                ->setUploadDir('/public/assets/img/blog')
                ->setUploadedFileNamePattern("[name]-[timestamp].[extension]"),
            TextField::new('description'),
        ];
    }

}
