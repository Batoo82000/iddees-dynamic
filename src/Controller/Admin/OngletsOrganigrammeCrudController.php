<?php

namespace App\Controller\Admin;

use App\Entity\OngletsOrganigramme;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class OngletsOrganigrammeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return OngletsOrganigramme::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Gestion des onglets de l\'organigramme')
            ->setPageTitle('edit', 'Modification des onglets')
            ->setPageTitle('new', 'Ajout d\'un jeux d\'onglets');
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->update(Crud::PAGE_INDEX, Action::NEW,
                fn (Action $action) => $action->setLabel('Ajouter une thème'))
            ->update(Crud::PAGE_INDEX, Action::EDIT,
                fn (Action $action) => $action->setLabel('Modifier le thème'))
            ->update(Crud::PAGE_INDEX, Action::DELETE,
                fn (Action $action) => $action->setLabel('Supprimer le thème'))

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
            TextField::new('onglet1')->setLabel('Titre de l\'onglet 1'),
            TextEditorField::new('texte_onglet1')->setLabel('Texte de l\'onglet 1'),
            TextField::new('onglet2')->setLabel('Titre de l\'onglet 2'),
            TextEditorField::new('texte_onglet2')->setLabel('Texte de l\'onglet 2'),
            TextField::new('onglet3')->setLabel('Titre de l\'onglet 3'),
            TextEditorField::new('texte_onglet3')->setLabel('Texte de l\'onglet 3'),
        ];
    }

}
