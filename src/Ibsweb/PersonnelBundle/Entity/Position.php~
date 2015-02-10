<?php

namespace Ibsweb\PersonnelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Position
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Ibsweb\PersonnelBundle\Entity\PositionRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Position
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
   * @var string
   *
   * @ORM\Column(type="string", length=255)
   * @Assert\NotBlank()
   */
  protected $title;

  /**
   * @var integer
   *
   * @ORM\Column(type="integer")
   */
  protected $rank;

  /**
   * @var integer
   *
   * @ORM\Column(type="integer")
   */
  protected $professional_weight;

  /**
   * @var datetime
   *
   * @ORM\Column(type="datetime")
   */
  protected $created_at;
  /**
   * @var datetime
   *
   * @ORM\Column(type="datetime")
   */
  protected $updated_at;
  /**
   * @var boolean
   *
   * @ORM\Column(type="boolean")
   */
  protected $active;

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
     * Set title
     *
     * @param string $title
     * @return Position
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set rank
     *
     * @param integer $rank
     * @return Position
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
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Position
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     *
     * @param \DateTime $updatedAt
     * @return Position
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    /**
     * Get updated_at
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return Position
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set professional_weight
     *
     * @param integer $professionalWeight
     * @return Position
     */
    public function setProfessionalWeight($professionalWeight)
    {
        $this->professional_weight = $professionalWeight;

        return $this;
    }

    /**
     * Get professional_weight
     *
     * @return integer 
     */
    public function getProfessionalWeight()
    {
        return $this->professional_weight;
    }

    //End of getters/setters
    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtUpdatedAtValue()
    {
        $this->created_at = new \DateTime();
        $this->updated_at = new \DateTime();
    }
    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAtValue()
    {
        $this->updated_at = new \DateTime();
    }
}
