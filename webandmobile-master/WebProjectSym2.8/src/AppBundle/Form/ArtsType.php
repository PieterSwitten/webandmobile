<?php

namespace AppBundle\Form;

use Doctrine\DBAL\Types\StringType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class ArtsType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', HiddenType::class)
            ->add('naam',null)
            ->add('acthernaam',null)
            ->add('email', null)
            ->add('adress', null)
            ->add('profielfoto', FileType::class, array('label' => 'Image (JPG file)'))
            ->add('save', SubmitType::class, array('label' => 'Bewerken'));

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Arts',
        ));
    }
}