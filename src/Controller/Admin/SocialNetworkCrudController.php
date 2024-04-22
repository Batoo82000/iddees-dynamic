<?php

namespace App\Controller\Admin;

use App\Entity\SocialNetwork;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
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

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Gestion par site des réseaux sociaux')
            ->setPageTitle('edit', 'Modification des réseaux sociaux"')
            ->setPageTitle('new', 'Ajout d\'un site et de ses des réseaux sociaux"');
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->update(Crud::PAGE_INDEX, Action::NEW,
                fn (Action $action) => $action->setLabel('Ajouter'))
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
            IdField::new('id')->hideOnForm(),
            TextField::new('site', "Site d'IDDEES (obligatoire) :")->setRequired(true)
            ->setHelp("L'adresse des réseaux sociaux doivent ressembler à ça : 'https://www.google.fr'. Il faut inclure 'http' ou 'https' obligatoirement."),
            TextField::new('facebook', 'Facebook :'),
            TextField::new('instagram', 'Instagram :'),
            TextField::new('youtube', 'Youtube :'),
            TextField::new('tiktok','Tiktok :'),
            TextField::new('snapchat', 'SnapChat :'),
            TextField::new('telegram', 'Telegram :'),
            TextField::new('x', 'X :'),
            TextField::new('linkdin', 'LinkedIn :'),
        ];
    }

}
