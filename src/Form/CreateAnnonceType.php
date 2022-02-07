<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CreateAnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
           // ->add('id_bien')
            ->add('surface', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('nombre_piece', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('img', FileType::class, ['attr' => ['class' => 'form-control']])
           // ->add('slug', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('secteur', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('exposition', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('exterieur', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('energie', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('commentaire', TextareaType::class, ['attr' => ['class' => 'form-control']])
            //->add('id_type', EntityType::class, ['attr' => ['class' => 'form-control']])
            //->add('id_utilisateur', EntityType::class, ['attr' => ['class' => 'form-control']])
            //->add('id_type_annonce', EntityType::class, ['attr' => ['class' => 'form-control']])
            //->add('id_clik', EntityType::class, ['attr' => ['class' => 'form-control']])
            //->add('id_region', EntityType::class, ['attr' => ['class' => 'form-control']])
            
            ->add('save', SubmitType::class, ['attr' => ['class' => 'btn btn-success mt-5'],'label' => 'Create Task'])
            

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
