<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class PropertyDetailsType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('category', ChoiceType::class, array(
                    'choices' => array(
                        'Ongoing' => 'ongoing',
                        'Upcoming' => 'upcoming',
                        'Completed' => 'completed',
                    ), 'attr' => array('class' => 'form-control')))
                ->add('title', TextType::class, array('attr' => array('class' => 'form-control')))
                ->add('thumb', FileType::class, array('data_class' => null, 'label' => 'Thumbnail Image', 'attr' => array('class' => 'form-control')))
                ->add('thumb_info', TextType::class, array('attr' => array('class' => 'form-control')))
                ->add('type', ChoiceType::class, array(
                    'choices' => array(
                        'Residential' => 'Residential',
                        'Commercial' => 'Commercial',
                    ), 'attr' => array('class' => 'form-control')))
                ->add('location', TextType::class, array('attr' => array('class' => 'form-control')))
                ->add('additional_details', TextType::class, array('attr' => array('class' => 'form-control')))
                ->add('description', TextareaType::class, array('attr' => array('class' => 'form-control')))
                ->add('area', TextType::class, array('attr' => array('class' => 'form-control')))
                ->add('bed', TextType::class, array('attr' => array('class' => 'form-control')))
                ->add('bath', TextType::class, array('attr' => array('class' => 'form-control')))
                ->add('map', TextType::class, array('attr' => array('class' => 'form-control')))
                ->add('featured', ChoiceType::class, array(
                    'choices' => array(
                        'No' => false,
                        'Yes' => true,
                    ), 'attr' => array('class' => 'form-control')))
                ->add('save', SubmitType::class, array('label' => 'Save Project', 'attr' => array('style' => 'margin-top:10px;', 'class' => 'btn btn-primary min-wide')))
        ;
    }

}
