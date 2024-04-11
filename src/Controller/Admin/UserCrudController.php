<?php
namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserCrudController extends AbstractCrudController
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nickName'),
            ChoiceField::new('roles')
                ->allowMultipleChoices()
                ->setChoices([
                    'ROLE_ADMIN' => 'ROLE_ADMIN',
                    'ROLE_AUTHOR' => 'ROLE_AUTHOR',
                ])
                ->setFormTypeOptions([
                    'multiple' => true,
                    'expanded' => false,
                ])
                ->setFormType(ChoiceType::class),
            TextField::new('password')
                ->setFormType(RepeatedType::class)
                ->setFormTypeOptions([
                    'type' => PasswordType::class,
                    'first_options' => [
                        'label' =>'Password',
                    ],
                    'second_options' => [
                        'label' =>'Confirm Password',
                    ],
                ])
                ->onlyOnForms()
        ];
    }
}