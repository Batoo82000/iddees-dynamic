<?php

namespace App\Controller\Admin;

use App\Entity\SitesIddees;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\TelType;

class SitesIddeesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SitesIddees::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Gestion des Ressourceries/Recycleries')
            ->setPageTitle('edit', 'Modification dus site')
            ->setPageTitle('new', 'Création d\'un site');
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->update(Crud::PAGE_INDEX, Action::NEW,
                fn (Action $action) => $action->setLabel('Créer un site'))
            ->update(Crud::PAGE_INDEX, Action::EDIT,
                fn (Action $action) => $action->setLabel('Modifier le site'))
            ->update(Crud::PAGE_INDEX, Action::DELETE,
                fn (Action $action) => $action->setLabel('Supprimer le site'))

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
                ->setLabel('Nom du site (obligatoire) :')
                ->setRequired(true),
            TextField::new('mentionSpeciale')
                ->setLabel('Mention spéciale :'),
            TextareaField::new('carte')
                ->setRequired(true)
                ->setLabel('Carte Google Maps (obligatoire) :')
                ->setHelp('Pour ajouter la carte, allez sur le site de Google Maps, saissez le nom du site ou son adresse, cliquez sur partager->intégrer une carte->copier le contenu HTML, puis faites clique-droit->Coller dans dans "Carte Google Maps"'),
            ImageField::new('photo')
                ->setLabel('Photo de la façade du site :')
                ->setBasePath("assets/img/sites")
                ->setUploadDir('/public/assets/img/sites')
                ->setUploadedFileNamePattern("[name]-[timestamp].[extension]")
                ->setHelp('Avant de choisir une image, allez sur https://compressnow.com/fr/ , glissez l\'image dans "image originale", réglez le niveau de compression à 50%, puis téléchargez le résutat, que vous utiliserez ici'),
            TextField::new('adresse')
                ->setLabel('Adresse du site (ex: 37, rue Voltaire) :'),
            NumberField::new('codePostal')
                ->setLabel('Code postal :'),
            TextField::new('ville')
                ->setLabel('Ville (obligatoire) :')
                ->setRequired(true),
            NumberField::new('telephone')
                ->setLabel('Téléphone (ex : 563123456) :'),
            EmailField::new('email')
                ->setLabel('Courriel (obligatoire) :')
                ->setRequired(true),
            TextEditorField::new('description')
                ->setLabel('Courte description du site :'),
            AssociationField::new('horairesMagasin')
                ->setLabel('Horaires pour le magasin :')
                ->setHelp('Si un horaire pour le magasin n\'existe pas, vous pouvez en créer un dans la section "Horaires des Sites : Magasin"'),
            AssociationField::new('horairesApports')
                ->setLabel('Horaires pour les apports :')
                ->setHelp('Si un horaire pour les apports n\'existe pas, vous pouvez en créer un dans la section "Horaires des Sites : Apports"'),
            ];
    }

}
