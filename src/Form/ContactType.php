<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints as Assert;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label'=> false,
                'constraints' => new Assert\NotBlank(),
                'attr'=> [
                    "class"=> "input",
                    "placeholder" => "Nom et prénom",
                    "required"=> true
                ]
            ])
            ->add('email', EmailType::class, [
                'label'=> false,
                'constraints' => new Assert\Email(),
                'attr'=> [
                    "class"=> "input",
                    "placeholder" => "Email",
                    "required"=> true
                ]
            ])
            ->add('subject', ChoiceType::class, [
                'label'=> 'Objet de la demande : ',
                'choices'=> [
                    "Demande d'informations"=> "info",
                    "Demande d'adhésion" => "adhésion",
                    "Demande de collecte" => "collecte"
                ],
                'attr'=> [
                    "class"=> "intput select",
                    "required"=> true
                ]
            ])
            ->add('message', TextareaType::class, [
                'label'=> false,
                'constraints' => new Assert\NotBlank(),
                'attr'=> [
                    "class"=> "input textarea",
                    "placeholder" => "Votre message",
                    "required"=> true
                    ]
                ])
            ->add('human', CheckboxType::class, [
                'label' => 'Je ne suis pas un robot',
                'required' => true,
                'mapped' => false,
                'attr'=> [
                    "class"=> "checkbox"
                ],
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devez cocher cette case pour confirmer que vous n\'êtes pas un robot.'
                    ])
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer',
                'attr'=> [
                    "class"=> "btn",
                    ]
            ])
            ->getForm();
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
