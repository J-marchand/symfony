<?php

namespace App\Form;

use App\Entity\Inter;
use App\Entity\Level;
use App\Entity\Skill;
use App\Form\AdvertFormType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('advert', AdvertFormType::class)
            ->add('skill',  EntityType::class, [
                'class' => Skill::class,
                'multiple' => true,
                'expanded' => true,
                'choice_label' => 'name',
            ])
            ->add('level', EntityType::class, [
                'class' => Level::class,
                'expanded' => true,
                'choice_label' => 'name',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Inter::class,
        ]);
    }
}
