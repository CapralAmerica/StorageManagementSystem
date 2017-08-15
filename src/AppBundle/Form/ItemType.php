<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ItemType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('item_name', TextType::class, array('attr' => array('class'=>'form-control', 'style'=>'margin-bottom : 15px')))
            ->add('price',NumberType::class, array('scale'=>2,'attr' => array('class'=>'form-control', 'style'=>'margin-bottom : 15px')))
            ->add('quantity', IntegerType::class, array('attr' => array('class'=>'form-control', 'style'=>'margin-bottom : 15px')))
            ->add('release_date', DateType::class, array('attr' => array('class'=>'form-control', 'style'=>'margin-bottom : 15px')))
            ->add('expiration_date', DateType::class, array('attr' => array('class'=>'form-control', 'style'=>'margin-bottom : 15px')))
            ->add('shelf', EntityType::class, array('class' => Shelving::class, 'choice_label' => 'id'))
            ->add('submit', SubmitType::class, array('attr' => array('class'=>'btn btn-primary')))
            ->getForm();
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Item'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_item';
    }


}
