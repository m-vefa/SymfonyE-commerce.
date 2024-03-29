<?php

namespace App\Form;

use App\Entity\Kullanici;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class KullaniciType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            //  ->add('roles')
            ->add('password')
            ->add('city')
            ->add('phone')
            ->add('name')
            ->add('status')

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Kullanici::class,


        ]);
    }
}
