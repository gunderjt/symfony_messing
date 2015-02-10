<?php

namespace Ibsweb\PersonnelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Personnel
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class ProfessionalPosition
{
  /**
   * @var integer
   *
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @var integer
   *
   * @ORM\ManyToOne(targetEntity="Position")
   * @ORM\JoinColumn(name="position_id", referencedColumnName="id")
   */
  protected $positionId;

  /**
   * @ORM\ManyToOne(targetEntity="Personnel", inversedBy="professionalPosition")
   * @ORM\JoinColumn(name="personnel_id", referencedColumnName="id")
   */
  protected $personnelId;

  /**
   * @var \DateTime
   *
   * @ORM\Column(name="created_at", type="datetime")
   */
  protected $createdAt;

  /**
   * @var \DateTime
   *
   * @ORM\Column(name="updated_at", type="datetime")
   */
  protected $updatedAt;

  //Begin lifecycle function calls
  /**
   * @ORM\PrePersist
   */
  public function setCreatedAtUpdatedAtValue()
  {
    $this->createdAt = new \DateTime();
    $this->updatedAt = new \DateTime();
  }
  /**
   * @ORM\PreUpdate
   */
  public function setUpdatedAtValue()
  {
    $this->updatedAt = new \DateTime();
  }

  /**
   * Get id
   *
   * @return integer 
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set createdAt
   *
   * @param \DateTime $createdAt
   * @return ProfessionalPosition
   */
  public function setCreatedAt($createdAt)
  {
    $this->createdAt = $createdAt;

    return $this;
  }

  /**
   * Get createdAt
   *
   * @return \DateTime 
   */
  public function getCreatedAt()
  {
    return $this->createdAt;
  }

  /**
   * Set updatedAt
   *
   * @param \DateTime $updatedAt
   * @return ProfessionalPosition
   */
  public function setUpdatedAt($updatedAt)
  {
    $this->updatedAt = $updatedAt;

    return $this;
  }

  /**
   * Get updatedAt
   *
   * @return \DateTime 
   */
  public function getUpdatedAt()
  {
    return $this->updatedAt;
  }

  /**
   * Set positionId
   *
   * @param \Ibsweb\PersonnelBundle\Entity\Position $positionId
   * @return ProfessionalPosition
   */
  public function setPositionId(\Ibsweb\PersonnelBundle\Entity\Position $positionId = null)
  {
    $this->positionId = $positionId;

    return $this;
  }

  /**
   * Get positionId
   *
   * @return \Ibsweb\PersonnelBundle\Entity\Position 
   */
  public function getPositionId()
  {
    return $this->positionId;
  }

  /**
   * Set personnelId
   *
   * @param \Ibsweb\PersonnelBundle\Entity\Personnel $personnelId
   * @return ProfessionalPosition
   */
  public function setPersonnelId(\Ibsweb\PersonnelBundle\Entity\Personnel $personnelId = null)
  {
    $this->personnelId = $personnelId;

    return $this;
  }

  /**
   * Get personnelId
   *
   * @return \Ibsweb\PersonnelBundle\Entity\Personnel 
   */
  public function getPersonnelId()
  {
    return $this->personnelId;
  }
}
