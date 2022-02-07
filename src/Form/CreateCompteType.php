<?php

namespace App\Form;

use App\Entity\CompteUtilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class CreateCompteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
           // ->add('id_utilisateur', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('civilite', ChoiceType::class, ['attr' => [
                'choices' => [
                    'Monsieur' => 'H',
                    'Madame' => 'F'
                ],
            ]])
            ->add('pseudo', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('mdp', PasswordType::class, ['attr' => ['class' => 'form-control']])
            ->add('email', EmailType::class, ['attr' => ['class' => 'form-control']])
            ->add('tel_utilisateur', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('save', SubmitType::class, ['attr' => ['class' => 'btn btn-success mt-5'],'label' => 'Create Task']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
            'data_class' => CompteUtilisateur::class,
        ]);
    }
}
