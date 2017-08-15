<?php

namespace AppBundle\Form;

use AppBundle\Entity\Shelving;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;



class ShelfType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('holdingCapacity', IntegerType::class, array('attr' => array('class'=>'form-control', 'style'=>'margin-bottom : 15px')))
                ->add('shelfName', IntegerType::class, array('attr' => array('class'=>'form-control', 'style'=>'margin-bottom : 15px')))
                ->add('shelving', EntityType::class, array('class' => Shelving::class, 'choice_label' => 'id'))
                ->add('submit', SubmitType::class, array('attr' => array('class'=>'btn btn-primary')))
                ->getForm();

    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Shelf'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_shelf';
    }


}
