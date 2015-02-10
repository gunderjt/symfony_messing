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
      ->add('label')
      ->add('save', 'submit');
  }

  public function setDefaultOptions(OptionsResolverInterface $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => 'Ibsweb\PersonnelBundle\Entity\DegreeType',
    ));
  }

  public function getName()
  {
      return 'degree_type';
  }
}