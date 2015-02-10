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
 *ToDo: 
 *  1) OPTION other options: Add other specific lists;  Logically how to do that
 *  2) IBS Academic/Professional Position;  Multiple
 *  3) Non persisted getters and setters; retirement_check?
 */
class Personnel
{
  //The objects of Personnel
  /**
   * @var integer
   *
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @var string
   *
   * @ORM\Column(name="first_name", type="string", length=255)
   */
  protected $first_name;

  /**
   * @var string
   *
   * @ORM\Column(name="last_name", type="string", length=255)
   */
  protected $last_name;

  /**
   * @var string
   *
   * @ORM\Column(name="salutation", type="string", length=255)
   */
  protected $salutation;

  /**
   * @var \DateTime
   *
   * @ORM\Column(name="retired_date", type="datetime", nullable=true)
   */
  protected $retiredDate;

  /**
   * @ORM\Column(type="text")
   */
  protected $notes;

  /**
   * @ORM\Column(type="boolean")
   */
  protected $optOut;

  /**
   * @ORM\Column(type="boolean")
   */
  protected $weekly_email;


  /**
   * Bidirectional - Many users have Many favorite comments (OWNING SIDE)
   *
   * @ORM\OneToMany(targetEntity="ProfessionalPosition", mappedBy="personnelId", cascade={"persist"})
   */
  protected $professionalPosition;


  /**
   * Bidirectional - Many users have Many favorite comments (OWNING SIDE)
   *
   * @ORM\OneToMany(targetEntity="EmploymentRecord", mappedBy="personnel", cascade={"persist"})
   */
  protected $employmentRecords;

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

  //non persisted attr;
  protected $is_retired;

  public function __construct(){
    $this->employmentRecords = new ArrayCollection();
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
     * Set first_name
     *
     * @param string $firstName
     * @return Personnel
     */
    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;

        return $this;
    }

    /**
     * Get first_name
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set last_name
     *
     * @param string $lastName
     * @return Personnel
     */
    public function setLastName($lastName)
    {
        $this->last_name = $lastName;

        return $this;
    }

    /**
     * Get last_name
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set salutation
     *
     * @param string $salutation
     * @return Personnel
     */
    public function setSalutation($salutation)
    {
        $this->salutation = $salutation;

        return $this;
    }

    /**
     * Get salutation
     *
     * @return string 
     */
    public function getSalutation()
    {
        return $this->salutation;
    }

    /**
     * Set retiredDate
     *
     * @param \DateTime $retiredDate
     * @return Personnel
     */
    public function setRetiredDate($retiredDate)
    {
        $this->retiredDate = $retiredDate;

        return $this;
    }

    /**
     * Get retiredDate
     *
     * @return \DateTime 
     */
    public function getRetiredDate()
    {
      //Should I set is_retired here?
      $this->retiredDate === null ? $this->is_retired = false : $this->is_retired = true;  
      return $this->retiredDate;
    }

    /**
     * Set notes
     *
     * @param string $notes
     * @return Personnel
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes
     *
     * @return string 
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set optOut
     *
     * @param boolean $optOut
     * @return Personnel
     */
    public function setOptOut($optOut)
    {
        $this->optOut = $optOut;

        return $this;
    }

    /**
     * Get optOut
     *
     * @return boolean 
     */
    public function getOptOut()
    {
        return $this->optOut;
    }

    /**
     * Set weekly_email
     *
     * @param boolean $weeklyEmail
     * @return Personnel
     */
    public function setWeeklyEmail($weeklyEmail)
    {
        $this->weekly_email = $weeklyEmail;

        return $this;
    }

    /**
     * Get weekly_email
     *
     * @return boolean 
     */
    public function getWeeklyEmail()
    {
        return $this->weekly_email;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Personnel
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
     * @return Personnel
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

    public function getName(){
      return $this->first_name . " " . $this->last_name;
    }

    /**
     * Add professionalPosition
     *
     * @param \Ibsweb\PersonnelBundle\Entity\ProfessionalPosition $professionalPosition
     * @return Personnel
     */
    public function addProfessionalPosition(\Ibsweb\PersonnelBundle\Entity\ProfessionalPosition $professionalPosition)
    {
        $this->professionalPosition[] = $professionalPosition;

        return $this;
    }

    /**
     * Remove professionalPosition
     *
     * @param \Ibsweb\PersonnelBundle\Entity\ProfessionalPosition $professionalPosition
     */
    public function removeProfessionalPosition(\Ibsweb\PersonnelBundle\Entity\ProfessionalPosition $professionalPosition)
    {
        $this->professionalPosition->removeElement($professionalPosition);
    }

    /**
     * Get professionalPosition
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProfessionalPosition()
    {
        return $this->professionalPosition;
    }

    /**
     * Add employmentRecords
     *
     * @param \Ibsweb\PersonnelBundle\Entity\EmploymentRecord $employmentRecords
     * @return Personnel
     */
    public function addEmploymentRecord(\Ibsweb\PersonnelBundle\Entity\EmploymentRecord $employmentRecords)
    {
        $this->employmentRecords[] = $employmentRecords;

        return $this;
    }

    /**
     * Remove employmentRecords
     *
     * @param \Ibsweb\PersonnelBundle\Entity\EmploymentRecord $employmentRecords
     */
    public function removeEmploymentRecord(\Ibsweb\PersonnelBundle\Entity\EmploymentRecord $employmentRecords)
    {
        $this->employmentRecords->removeElement($employmentRecords);
    }

    /**
     * Get employmentRecords
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEmploymentRecords()
    {
        return $this->employmentRecords;
    }
}
