<?php

namespace App\Form;

use App\Entity\Housing;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HousingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('adress')
            ->add('surface')
            ->add('piece')
            ->add('dateEnter')
            ->add('dateExit')
            ->add('owner')
            ->add('rent')
            ->add('locataire')
            ->add('proprietaire')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Housing::class,
        ]);
    }
}
