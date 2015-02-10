<?php

namespace Ibsweb\PersonnelBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AffiliationType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
      $builder
          ->add('instituteName')
          ->add('rank')
          ->add('website')
          ->add('phone')
          ->add('fax')
          ->add('email')
          ->add('save', 'submit');
  }

  public function setDefaultOptions(OptionsResolverInterface $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => 'Ibsweb\PersonnelBundle\Entity\Affiliation',
    ));
  }

  public function getName()
  {
      return 'affiliation';
  }
}