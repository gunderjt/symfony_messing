<?php

namespace Ibsweb\PersonnelBundle\Entity;

use Doctrine\ORM\EntityRepository;

class PositionRepository extends EntityRepository
{
  public function findAllOrderedByTitle(){
    return $this->getEntityManager()
      ->createQuery(
        'SELECT p FROM IbswebPersonnelBundle:Position p ORDER BY p.title ASC'
      )
      ->getResult();
  }
}