<?php

namespace App\Controller\Admin;

use App\Entity\Blog;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class BlogCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Blog::class;
    }
    public function configureAssets(Assets $assets): Assets
    {
        return $assets
            ->addCssFile('assets/css/easyadmin.css');
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Gestion des Articles')
            ->setPageTitle('edit', 'Modification de l\'article')
            ->setPageTitle('new', 'Création d\'un article');
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->update(Crud::PAGE_INDEX, Action::NEW,
                fn (Action $action) => $action->setLabel('Créer un article'))
            ->update(Crud::PAGE_INDEX, Action::EDIT,
                fn (Action $action) => $action->setLabel('Modifier l\'article'))
            ->update(Crud::PAGE_INDEX, Action::DELETE,
                fn (Action $action) => $action->setLabel('Supprimer l\'article'))

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
            DateField::new('created_at')
                ->hideOnForm()
                ->setLabel('Date de création'),
            TextField::new('titre')
                ->setLabel('Titre de l\'article (obligatoire) :')
                ->setRequired(true),
            SlugField::new('slug')
                ->setTargetFieldName('titre')
                ->hideOnIndex(),
            AssociationField::new('themes')
                ->hideOnIndex()
                ->setLabel('Choisissez un thème pour l\'article :')
                ->setHelp('Si un thème n\'existe pas, vous pouvez en créer un dans la section "Thèmes associés aux articles"'),
            AssociationField::new('auteur')->setRequired(true)
                ->setLabel('Quel est l\'auteur de l\'article (obligatoire) :')
                ->setHelp('Si l\'auteur n\'existe pas, vous pouvez le créer dans la section "Auteurs des articles"'),
            TextEditorField::new('texte_blog')->setRequired(true)
                ->setLabel('Texte de l\'article (obligatoire) :'),
            AssociationField::new('images')->hideOnIndex()
                ->autocomplete()
                ->setLabel('Choisissez une ou des images pour l\'article :')
                ->setHelp('Vous devez d\'abord ajouter l\'image par la section "Images Articles", puis la sélectionner ici'),
            AssociationField::new('sources')->hideOnIndex()
                ->autocomplete()
                ->setLabel('Choisissez une ou des sources pour l\'article :')
                ->setHelp('Vous devez d\'abord ajouter la vidéo par la section "Vidéos Articles", puis la sélectionner ici'),
            AssociationField::new('videos')->hideOnIndex()
                ->autocomplete()
                ->setLabel('Choisissez une ou des vidéos pour l\'article :')
                ->setHelp('Vous devez la source par la section "Sources Articles", puis la sélectionner ici')
                ->setCssClass('custom_video_class'),
        ];
    }

}
