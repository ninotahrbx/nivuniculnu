<?php

namespace App\Form;
use App\Entity\Bien;
use App\Entity\TypeBien;
use App\Entity\TypeAnnonce;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CreateAnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            //->add('idBien', EntityType::class, ['class' => Bien::class, 'choice_label' => 'idBien',])
            ->add('surface', IntegerType::class, ['attr' => ['class' => 'form-control',           
                'type'=>"number",
                'min'=>"0",
                 'max'=>"2500",
                 'step'=>"5",
                 'placeholder'=>"0"
               ]])
            ->add('nombrePiece', IntegerType::class, ['attr' => ['class' => 'form-control',
             'type'=>"number", 
             'min'=>"0",
             'max'=>"15",
             'placeholder'=>"0"
             ]])
            ->add('img', FileType::class, ['attr' => [
                'class' => 'form-control',
                 'required'   => true, 
                 'multiple' => true
                 ]])
            //->add('slug', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('prix', TextType::class, ['attr' => [
                'class' => 'form-control'
                ]])
            //->add('secteur', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('exposition', ChoiceType::class, ['choices'  => [               
                'Nord' => 'N',
                'Sud' => 'S',
                'Est' => 'E',
                'Ouest' => 'O',
                'Nord-Est' => 'N-E',
                'Sud-Est' => 'S-E',
                'Nord-Ouest' => 'N-O',
                'Sud-Ouest' => 'S-O'               
            ],])
            ->add('exterieur',  ChoiceType::class, ['choices'  => [               
                'Oui' => 'Oui',
                'Non' => 'Non',
            ],])
            ->add('energie', ChoiceType::class, [
                'choices' => [
                    'A' => 'A',
                    'B' => 'B',
                    'C' => 'C',
                    'D' => 'D'
                ],])
            ->add('description', TextareaType::class, ['attr' => ['class' => 'form-control']])
            //->add('dateParution', DateType::class, ['attr' => ['class' => 'form-control']])
            ->add('idType',  EntityType::class, [
                'class' => TypeBien::class,
                'choice_label' => 'libelleType',
                'placeholder' => '-- Sélectionnez un type de bien --',  
                'required'   => true,
                'expanded' => true,
                'multiple' => true
                ])
            //->add('id_utilisateur', EntityType::class, ['attr' => ['class' => 'form-control']])
            ->add('idTypeAnnonce',  EntityType::class, [
                'class' => TypeAnnonce::class,
                'choice_label' => 'libelleTypeAnnonce',
                'placeholder' => "-- Sélectionnez un type d'annonce --",  
                'required'   => true,
                'expanded' => true,
                'multiple' => true
                ])
            //->add('id_clik', EntityType::class, ['attr' => ['class' => 'form-control']])
            
            ->add('save', SubmitType::class, ['attr' => ['class' => 'btn btn-success mt-5'],'label' => 'Enregistrer'])
          /*  ->add('codePostal', TextType::class, ['attr' => [
                'class' => 'form-control',
                'id' => 'codepostal',
                'name' => 'codepostal',
                'placeholder'=>"@75000"
                ]])

            /*->add('ville', choiceType::class, ['attr' => [
                'class' => 'form-control',
                'id' => 'ville',
                'name' => 'ville', 
                // 'choices'=> []                         
              ]]) */

           /*  ->addEventListener(
                FormEvents::PRE_SUBMIT,
                [$this, 'onPreSubmit'])

 */


              ;
    }



    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }

    /* public function onPreSubmit(FormEvent $event)
    {
        $input = $event->getData()['city'];
        $event->getForm()->add('ville', ChoiceType::class,
            ['choices' => [$input]]);
    }
 */
}
