<?php

namespace App\Form;

use App\Entity\Bien;
use App\Entity\Filtres;
use App\Entity\TypeBien;
use App\Entity\TypeAnnonce;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class FiltresType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options = []): void
    {
        $builder


        ->add('idType',  EntityType::class, [
            'class' => TypeBien::class,           
            'choice_label' => 'libelleType', 
            'multiple' => true,
            'placeholder' => '-- Selectionnez un type de bien --',
            'expanded' => true,
            'required'   => true,
            'attr' => [
                'id' => 'typeBien',
                "value" => 'idType',
                'checked'
            ]
        ])

        ->add('idTypeAnnonce',  EntityType::class, [
            'class' => TypeAnnonce::class,
            'choice_label' => 'libelleTypeAnnonce', 
            'multiple' => true,
            'placeholder' => "-- Selectionnez un type d'annonce --",
            'expanded' => true,
            'required'   => true,
            'attr' => [
                'id' => 'typeAnnonce',
                "value" => 'idTypeAnnonce',
                'checked'
            ]
        ])

   
            ->add('minSurface', IntegerType::class,['attr' => [
             'class' => 'form-control', 
             'id' => 'minSurface', 
             "value" => 'minSurface', 
             'type'=>"number",
             'min'=>"0",
             'max'=>"2500",
             'step'=>"5",
             'placeholder'=>"0",
             'required' => false, 
             'expanded' => false,
             'multiple' => false
        ]])

            ->add('nombrePiece', IntegerType::class, ['attr' => [
             'class' => 'form-control',
             'id' => 'nombrePiece',
             "value" => 'nombrePiece',
             'type'=>"number", 
             'min'=>"0",
             'max'=>"15",
             'placeholder'=>"0",
             'required' => false, 
             'expanded' => false,
            'multiple' => false
             ]])

            ->add('prixMax', IntegerType::class,['attr' => [
             'class' => 'form-control', 
             'id' => 'prixMax', 
             "value" => 'prixMax',
             'type'=>"number",
             'min'=>"0",
             'max'=>"5000000",
             'step'=>"100",
             'placeholder'=>"0",
             'required' => false,
             'expanded' => false,
             'multiple' => false           
            ]])

            ->add('submit', SubmitType::class,['attr' => [
             'class' => 'form-control bg-succes text-white', 
             'id' => 'submit',   
             'label' => 'rechercher',
             'style' => 'border: 2px solid white', '#submit:hover{color: green; }'
            ]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Filtres::class,
            'method' =>'get',
            'csrf_protection' => false
        ]);
    }


    public function getBlockPrefix()
    {
        return '';
    }



}
