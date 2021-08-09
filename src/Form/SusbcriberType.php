<?php

namespace App\Form;

use App\Entity\Subcriber;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class SusbcriberType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'firstname',
                TextType::class,
                [
                    'attr' => [
                        'placeholder' => "Veuillez entrer votre prénom", 'class' => "form-control"
                    ]
                ]
            )
            ->add('lastname', TextType::class, [
                'attr' => [
                    'placeholder' => "Veuillez entrer votre nom", 'class' => "form-control"
                ]
            ])
            ->add('image', FileType::class, [
                'attr' => [
                    'placeholder' => "Saississez un Url", 'class' => "form-control", 'require'=>True
                ]
            ])
            ->add('password', PasswordType::class, [
                'attr' => [
                    'placeholder' => "Veuillez entrer un mot de passe valide", 'class' => "form-control"
                ]
            ])
            ->add('verifiedPassword', PasswordType::class, [
                'attr' => [
                    'placeholder' => "Veuillez confirmer votre mot de passe", 'class' => "form-control"
                ]
            ])
            ->add('email', TextType::class, [
                'attr' => [
                    'placeholder' => "Veuillez entrer un email valide", 'class' => "form-control"
                ]
            ])
            ->add('age', IntegerType::class, [
                'attr' => [
                    'placeholder' => "Veuillez saisir votre email", 'class' => "form-control"
                ]
            ])
            ->add('address', TextType::class, [
                'attr' => [
                    'placeholder' => "Veuillez entrer votre adresse", 'class' => "form-control"
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Subcriber::class,
        ]);
    }
}
