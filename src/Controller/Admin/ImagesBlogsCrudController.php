<?php

namespace App\Controller\Admin;

use App\Entity\ImagesBlogs;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
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
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Gestion des images')
            ->setPageTitle('edit', 'Modification d\'une image')
            ->setPageTitle('new', 'Ajout d\'une image');
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->update(Crud::PAGE_INDEX, Action::NEW,
                fn (Action $action) => $action->setLabel('Ajouter une image'))
            ->update(Crud::PAGE_INDEX, Action::EDIT,
                fn (Action $action) => $action->setLabel('Modifier l\'image'))
            ->update(Crud::PAGE_INDEX, Action::DELETE,
                fn (Action $action) => $action->setLabel('Supprimer l\'image'))

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
                ->setRequired(true)
                ->setLabel('Titre de l\'image (obligatoire) :'),
            ImageField::new('path')
                ->setLabel('Choisissez l\'image à ajouter (obligatoire) :')
                ->setRequired(true)
                ->setBasePath("assets/img/blog")
                ->setUploadDir('/public/assets/img/blog')
                ->setUploadedFileNamePattern("[name]-[timestamp].[extension]")
                ->setHelp('Avant de choisir une image, allez sur https://compressnow.com/fr/ , glissez l\'image dans "image originale", réglez le niveau de compression à 50%, puis téléchargez le résutat, que vous utiliserez ici'),
            TextField::new('description')
                ->setLabel('Description succincte de l\'image  :'),
        ];
    }

}
