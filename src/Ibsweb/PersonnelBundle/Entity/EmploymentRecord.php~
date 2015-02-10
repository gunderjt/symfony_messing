<?php

namespace Ibsweb\PersonnelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EmploymentRecord
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class EmploymentRecord
{
  /**
   * @var integer
   *
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  //A employmentRecord belongs to personnel
  /**
   * @ORM\ManyToOne(targetEntity="Personnel", inversedBy="employmentRecords")
   * @ORM\JoinColumn(name="personnel_id", referencedColumnName="id")
   */
  protected $personnel;

  //An affiliation has many employment records
  /**
   * @var integer
   *
   * @ORM\ManyToOne(targetEntity="Affiliation")
   * @ORM\JoinColumn(name="affiliation_id", referencedColumnName="id")
   */
  protected $affiliationId;

  //A position has many employment records
  /**
   * @var integer
   *
   * @ORM\ManyToOne(targetEntity="Position")
   * @ORM\JoinColumn(name="position_id", referencedColumnName="id")
   */
  protected $positionId;

  /**
   * @var \DateTime
   *
   * @ORM\Column(name="start_date", type="datetime")
   */
  protected $startDate;

  /**
   * @var \DateTime
   *
   * @ORM\Column(name="end_date", type="datetime", nullable=true)
   */
  protected $endDate;


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


  public function __construct(){
    $this->startDate = new \DateTime();
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
   * Set affiliationId
   *
   * @param integer $affiliationId
   * @return EmploymentRecord
   */
  public function setAffiliationId($affiliationId)
  {
    $this->affiliationId = $affiliationId;

    return $this;
  }

  /**
   * Get affiliationId
   *
   * @return integer 
   */
  public function getAffiliationId()
  {
    return $this->affiliationId;
  }

  /**
   * Set positionId
   *
   * @param integer $positionId
   * @return EmploymentRecord
   */
  public function setPositionId($positionId)
  {
    $this->positionId = $positionId;

    return $this;
  }

  /**
   * Get positionId
   *
   * @return integer 
   */
  public function getPositionId()
  {
    return $this->positionId;
  }

  /**
   * Set createdAt
   *
   * @param \DateTime $createdAt
   * @return EmploymentRecord
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
   * @return EmploymentRecord
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
   * Set startDate
   *
   * @param \DateTime $startDate
   * @return EmploymentRecord
   */
  public function setStartDate($startDate)
  {
    $this->startDate = $startDate;

    return $this;
  }

  /**
   * Get startDate
   *
   * @return \DateTime 
   */
  public function getStartDate()
  {
    return $this->startDate;
  }

  /**
   * Set endDate
   *
   * @param \DateTime $endDate
   * @return EmploymentRecord
   */
  public function setEndDate($endDate)
  {
    $this->endDate = $endDate;

    return $this;
  }

  /**
   * Get endDate
   *
   * @return \DateTime 
   */
  public function getEndDate()
  {
    return $this->endDate;
  }

  //End of Getters and Setters
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
     * Set personnel
     *
     * @param \Ibsweb\PersonnelBundle\Entity\Personnel $personnel
     * @return EmploymentRecord
     */
    public function setPersonnel(\Ibsweb\PersonnelBundle\Entity\Personnel $personnel = null)
    {
        $this->personnel = $personnel;

        return $this;
    }

    /**
     * Get personnel
     *
     * @return \Ibsweb\PersonnelBundle\Entity\Personnel 
     */
    public function getPersonnel()
    {
        return $this->personnel;
    }
}
