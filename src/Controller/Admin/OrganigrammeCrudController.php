<?php

namespace App\Controller\Admin;

use App\Entity\Organigramme;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
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
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Organigramme')
            ->setPageTitle('edit', 'Modification d\'une personne de l\'organigramme')
            ->setPageTitle('new', 'Ajout d\'une personne dans l\'organigramme');
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->update(Crud::PAGE_INDEX, Action::NEW,
                fn (Action $action) => $action->setLabel('Ajouter une personne'))
            ->update(Crud::PAGE_INDEX, Action::EDIT,
                fn (Action $action) => $action->setLabel('Modifier la personne'))
            ->update(Crud::PAGE_INDEX, Action::DELETE,
                fn (Action $action) => $action->setLabel('Supprimer la personne'))

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
                ->hideOnIndex()
                ->hideOnForm(),
            TextField::new('nom')
                ->setLabel('Nom (obligatoire)')
                ->setRequired(true),
            TextField::new('prenom')
                ->setLabel('Prénom (obligatoire)')
                ->setRequired(true),
            ImageField::new('photo')
                ->setBasePath("assets/img/organigramme")
                ->setUploadDir('/public/assets/img/organigramme')
                ->setUploadedFileNamePattern("[name]-[timestamp].[extension]"),
            AssociationField::new('roleOrganigramme')
                ->setLabel('Rôle dans l\'organigramme (obligatoire)')
                ->setRequired(true)
                ->setHelp('Si le rôle n\'existe pas, vous pouvez le créer dans "Rôles au sein de  l\'organigramme"'),
            AssociationField::new('localisationSites')
                ->setLabel('Quel est la localisation de la personne (obligatoire)')
                ->setRequired(true)
                ->setHelp('Si le site n\'existe pas, vous pouvez le créer dans "Localisations pour l\'organigramme"'),
        ];
    }

}
