<?php

namespace Ibsweb\PersonnelBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PositionType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('title')
      ->add('rank')
      ->add('professional_weight', null, 
        array(
          'required' => false,
          'label' => "If this an academic/professional position,
          fill in form order (zero if not academic/professional position)"
        )
      )
      ->add('active', null, array('required' => false))
      ->add('save', 'submit');
  }

  public function setDefaultOptions(OptionsResolverInterface $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => 'Ibsweb\PersonnelBundle\Entity\Position',
    ));
  }

  public function getName()
  {
      return 'position';
  }
}