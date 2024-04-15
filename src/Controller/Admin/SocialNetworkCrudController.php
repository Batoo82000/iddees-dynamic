<?php

namespace App\Controller\Admin;

use App\Entity\SocialNetwork;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SocialNetworkCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SocialNetwork::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('site')->setRequired(true),
            TextField::new('facebook'),
            TextField::new('instagram'),
            TextField::new('youtube'),
            TextField::new('tiktok'),
            TextField::new('snapchat'),
            TextField::new('telegram'),
            TextField::new('x'),
            TextField::new('linkdin'),
        ];
    }

}
