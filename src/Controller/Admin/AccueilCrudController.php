<?php

namespace App\Controller\Admin;

use App\Entity\Accueil;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AccueilCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Accueil::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Gestion de la page d\'accueil (il ne peut y en avoir qu\'une)')
            ->setPageTitle('edit', 'Modification de la page d\'accueil')
            ->setPageTitle('new', 'Ajout de la page d\'accueil');
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnIndex()
                ->hideOnForm(),
            TextField::new('titre')->setRequired(true),
            TextEditorField::new('description')->setRequired(true),
        ];
    }

}
