<?php

namespace App\Controller\Admin;

use App\Entity\MentionsLegales;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;


class MentionsLegalesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MentionsLegales::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Gestion de la page "Mentions Légales"')
            ->setPageTitle('edit', 'Modification de la page "Mentions Légales"')
            ->setPageTitle('new', 'Ajout d\'une page "Mentions Légales"');
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->update(Crud::PAGE_INDEX, Action::NEW,
                fn (Action $action) => $action->setLabel('Ajouter un contenu'))
            ->update(Crud::PAGE_INDEX, Action::EDIT,
                fn (Action $action) => $action->setLabel('Modifier le contenu'))
            ->update(Crud::PAGE_INDEX, Action::DELETE,
                fn (Action $action) => $action->setLabel('Supprimer le contenu'))

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
            TextEditorField::new('content', 'Contenu de "Mentions Légales" (obligatoire) :')->setRequired(true),
        ];
    }
}
