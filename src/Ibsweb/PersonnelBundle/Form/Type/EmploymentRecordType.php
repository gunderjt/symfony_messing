<?php

namespace Ibsweb\PersonnelBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EmploymentRecordType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('positionId', 'entity', 
        array(
          'class' => 'IbswebPersonnelBundle:Position',
          'property' => 'title',
          'label' => 'Position',
        )
      )
      ->add('affiliationId', 'entity',
        array(
          'class' => 'IbswebPersonnelBundle:Affiliation',
          'property' => 'instituteName',
          'label' => 'Affiliation',
        )
      )
      ->add('startDate', 'date', 
        array(
          'input' => 'datetime',
          'widget' => 'choice',
          'format' => 'MM-dd-yyyy'
        )
      )
      ->add('endDate', 'date', 
        array(
          'required' => false,
          'input' => 'datetime',
          'widget' => 'choice',
          'format' => 'MM-dd-yyyy'
        )
      )
      ->add('save', 'submit');
  }

  public function setDefaultOptions(OptionsResolverInterface $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => 'Ibsweb\PersonnelBundle\Entity\EmploymentRecord',
    ));
  }

  public function getName()
  {
    return 'employment_record';
  }
}