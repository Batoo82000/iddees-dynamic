<?php

namespace App\Controller\Admin;

use App\Entity\Partners;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PartnersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Partners::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Gestion des Partenaires')
            ->setPageTitle('edit', 'Modification du partenaire')
            ->setPageTitle('new', 'Création d\'un partenaire');
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->update(Crud::PAGE_INDEX, Action::NEW,
                fn (Action $action) => $action->setLabel('Créer un partenaire'))
            ->update(Crud::PAGE_INDEX, Action::EDIT,
                fn (Action $action) => $action->setLabel('Modifier le partenaire'))
            ->update(Crud::PAGE_INDEX, Action::DELETE,
                fn (Action $action) => $action->setLabel('Supprimer le partenaire'))

            ->remove(Crud::PAGE_NEW, Action::SAVE_AND_ADD_ANOTHER)
            ->add(Crud::PAGE_NEW, Action::INDEX)
            ->update(Crud::PAGE_NEW, Action::INDEX,
                fn (Action $action) => $action->setLabel('Revenir à l\'index'))
            ->update(Crud::PAGE_NEW, Action::SAVE_AND_RETURN,
                fn (Action $action) => $action->setLabel('Sauvegarder et retourner à l\'index'))

            ->update(Crud::PAGE_EDIT, Action::SAVE_AND_CONTINUE,
                fn (Action $action) => $action->setLabel('Sauvegarder et continuer'))
            ->update(Crud::PAGE_EDIT, Action::SAVE_AND_RETURN,
                fn (Action $action) => $action->setLabel('Sauvegarder et retourner à l\'index'));
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm()
                ->hideOnIndex(),
            TextField::new('nom')
                ->setLabel('Nom du partenaire (obligatoire) :')
                ->setRequired(true),
            TextEditorField::new('description')
                ->setLabel('Courte description du partenaire (obligatoire) :')
                ->setRequired(true),
            ImageField::new('logo')
                ->setLabel('Logo du partenaire :')
                ->setBasePath("assets/img/partners")
                ->setUploadDir('/public/assets/img/partners')
                ->setUploadedFileNamePattern("[name]-[timestamp].[extension]"),
            TextField::new('url')
                ->setLabel('Adresse internet (url) du site du partenaire :'),
            AssociationField::new('categories')
                ->setLabel('Choisissez une ou des catégories pour le partenaire (obligatoire) :')
                ->setHelp('Si une catégorie n\'existe pas, vous pouvez en créer une dans la section "Catégorie des partenaires"')
                ->addCssClass('custom_video_class'),
        ];
    }
}
