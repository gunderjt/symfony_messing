<?php

namespace Ibsweb\PersonnelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Affiliation
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class Affiliation
{
  /**
   * @var integer
   *
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * @var string
   *
   * @ORM\Column(name="institute_name", type="string", length=255)
   */
  private $instituteName;

  /**
   * @var integer
   *
   * @ORM\Column(name="rank", type="integer")
   */
  private $rank;

  /**
   * @var string
   *
   * @ORM\Column(name="website", type="string", length=255, nullable=true)
   */
  private $website = null;

  /**
   * @var string
   *
   * @ORM\Column(name="phone", type="string", length=255, nullable=true)
   */
  private $phone = null;

  /**
   * @var string
   *
   * @ORM\Column(name="fax", type="string", length=255, nullable=true)
   */
  private $fax = null;

  /**
   * @var string
   *
   * @ORM\Column(name="email", type="string", length=255, nullable=true)
   */
  private $email = null;

  /**
   * @var integer
   *
   * @ORM\Column(name="parent_institution_id", type="integer", nullable=true)
   */
  private $parentInstitutionId = null;

  /**
   * @var \DateTime
   *
   * @ORM\Column(name="created_at", type="datetime")
   */
  private $createdAt;

  /**
   * @var \DateTime
   *
   * @ORM\Column(name="updated_at", type="datetime")
   */
  private $updatedAt;


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
   * Set instituteName
   *
   * @param string $instituteName
   * @return Association
   */
  public function setInstituteName($instituteName)
  {
    $this->instituteName = $instituteName;

    return $this;
  }

  /**
   * Get instituteName
   *
   * @return string 
   */
  public function getInstituteName()
  {
    return $this->instituteName;
  }

  /**
   * Set rank
   *
   * @param integer $rank
   * @return Association
   */
  public function setRank($rank)
  {
    $this->rank = $rank;

    return $this;
  }

  /**
   * Get rank
   *
   * @return integer 
   */
  public function getRank()
  {
    return $this->rank;
  }

  /**
   * Set website
   *
   * @param string $website
   * @return Association
   */
  public function setWebsite($website)
  {
    $this->website = $website;

    return $this;
  }

  /**
   * Get website
   *
   * @return string 
   */
  public function getWebsite()
  {
    return $this->website;
  }

  /**
   * Set phone
   *
   * @param string $phone
   * @return Association
   */
  public function setPhone($phone)
  {
    $this->phone = $phone;

    return $this;
  }

  /**
   * Get phone
   *
   * @return string 
   */
  public function getPhone()
  {
    return $this->phone;
  }

  /**
   * Set fax
   *
   * @param string $fax
   * @return Association
   */
  public function setFax($fax)
  {
    $this->fax = $fax;

    return $this;
  }

  /**
   * Get fax
   *
   * @return string 
   */
  public function getFax()
  {
    return $this->fax;
  }

  /**
   * Set email
   *
   * @param string $email
   * @return Association
   */
  public function setEmail($email)
  {
    $this->email = $email;

    return $this;
  }

  /**
   * Get email
   *
   * @return string 
   */
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * Set parentInstitutionId
   *
   * @param integer $parentInstitutionId
   * @return Association
   */
  public function setParentInstitutionId($parentInstitutionId)
  {
    $this->parentInstitutionId = $parentInstitutionId;

    return $this;
  }

  /**
   * Get parentInstitutionId
   *
   * @return integer 
   */
  public function getParentInstitutionId()
  {
    return $this->parentInstitutionId;
  }

  /**
   * Set createdAt
   *
   * @param \DateTime $createdAt
   * @return Association
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
   * @return Association
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
}
