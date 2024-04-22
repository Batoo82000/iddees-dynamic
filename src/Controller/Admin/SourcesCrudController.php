<?php

namespace App\Controller\Admin;

use App\Entity\Sources;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SourcesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Sources::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Gestion des sources')
            ->setPageTitle('edit', 'Modification d\'une source')
            ->setPageTitle('new', 'Ajout d\'une source');
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->update(Crud::PAGE_INDEX, Action::NEW,
                fn (Action $action) => $action->setLabel('Ajouter une source'))
            ->update(Crud::PAGE_INDEX, Action::EDIT,
                fn (Action $action) => $action->setLabel('Modifier la source'))
            ->update(Crud::PAGE_INDEX, Action::DELETE,
                fn (Action $action) => $action->setLabel('Supprimer la source'))

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
            TextField::new('titre')
                ->setLabel('Titre de la source (obligatoire) :')
            ->setRequired(true),
            TextField::new('path')
                ->setLabel('Adresse url de la source (obligatoire) :')
                ->setRequired(true)
                ->setHelp("L'adresse de la source doit ressembler à ça : 'https://www.google.fr'. Il faut inclure 'http' ou 'https' obligatoirement."),
        ];
    }

}
