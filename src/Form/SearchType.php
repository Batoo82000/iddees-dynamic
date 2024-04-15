<?php

namespace App\Form;

use App\Classe\SearchBlogs;
use App\Entity\ThemesBlogs;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('themes', EntityType::class, [ //Le champs est de type EntityType, ce qui nous permet de lier une classe à l'input.
                'class'=> ThemesBlogs::class, // Grâce à cette ligne, on lie l'entité désirée à notre input
                'label' => false,
                'required' => false,
                'multiple'=> true, // les options multiple et expanded sont définies à true, ce qui signifie que l'utilisateur pourra sélectionner plusieurs catégories et que les options seront affichées sous forme de cases à cocher.
                'expanded'=>false,
                'row_attr' => [
                    'class' => 'select_btn'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label'=>'Filtrer',
                'attr'=> [
                    'class'=> 'btn'
                ]
            ])
        ;
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SearchBlogs::class, // La classe de données associée au formulaire est Search::class.
            'method'=> 'GET', // La méthode d'envoi du formulaire est définie sur "GET".
            'crsf_protection' => false, // a protection CSRF est désactivée (crsf_protection est défini sur false). Cela signifie que le formulaire ne générera pas automatiquement de jeton CSRF pour protéger contre les attaques CSRF.
        ]);
    }
    public function getBlockPrefix() //  Retourne une chaîne vide, ce qui signifie que le formulaire n'aura pas de préfixe. Cela signifie que les noms des champs dans le formulaire ne seront pas préfixés par le nom du formulaire lorsqu'ils sont rendus dans le HTML
    {
        return '';
    }

}
