<?php

namespace App\Form;

use App\Entity\CentreVaccination;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CentreVaccinationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom_centre')
            ->add('adresse')
            ->add('ville')
            ->add('nombre_vaccin_disponible')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CentreVaccination::class,
        ]);
    }
}
