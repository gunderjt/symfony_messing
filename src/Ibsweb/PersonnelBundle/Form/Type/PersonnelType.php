<?php

namespace Ibsweb\PersonnelBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Doctrine\ORM\EntityRepository;

class PersonnelType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('first_name', null, 
        array(
          'label' => 'First Name',
        )
      )
      ->add('last_name', null,
        array(
          'label' => 'Last Name',  
        )
      )
      ->add('salutation', null,
        array(
          'label' => 'Salutation',  
        )
      )
      ->add('is_retired', 'checkbox',
        array(
          'label' => 'Is retired?',
          'mapped' => false,
          'required' => false,
        )
      )
      ->add('retiredDate', 'date', 
        array(
          'required' => false,
          'input' => 'datetime',
          'widget' => 'choice',
          'format' => 'MM-dd-yyyy'
        )
      )
      ->add('professionalPosition', 'entity',
        array(
          'class' => 'IbswebPersonnelBundle:Position',
          'property' => 'title',
          'expanded' => true,
          'multiple' => false,
          'query_builder' => function(EntityRepository $er){
            return $er->createQueryBuilder('u')
              ->where('u.professional_weight > :weight')
              ->setParameter('weight', 0)
              ->orderBy('u.professional_weight', 'ASC');
          } 
        )
      )
      ->add('employmentRecords', 'collection',
        array(
          'type' => new EmploymentRecordType(),
          'allow_add' => true,
          'by_reference' => false,
          'allow_delete' => true,
        )
      )
      // ->addEventListener(FormEvents::PRE_SET_DATA, 'choice',
      //   array(
      //     'expanded' => true,
      //     'multiple' => false,
      //   )
      // )
      ->add('save', 'submit');
  }
  public function setDefaultOptions(OptionsResolverInterface $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => 'Ibsweb\PersonnelBundle\Entity\Personnel',
    ));
  }

  public function getName()
  {
    return 'personnel';
  }
}