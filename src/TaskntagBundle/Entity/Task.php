<?php
// TaskntagBundle/Entity/Task.php
namespace TaskntagBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * EmploymentRecord
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */

class Task
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
   * @ORM\Column(name="description", type="string", length=255)
   */
  protected $description;

  //A task has many tags
  /**
   * Bidirectional - Many users have Many favorite comments (OWNING SIDE)
   *
   * @ORM\ManyToMany(targetEntity="Tag", inversedBy="taskstaggedby", cascade={"persist"})
   * @ORM\JoinTable(name="task_tags")
   */
  protected $tags;

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

  public function __construct()
  {
    $this->tags = new ArrayCollection();
    $this->startDate = new \DateTime();
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function getTags()
  {
    return $this->tags;
  }

  public function addTag(Tag $tag)
  {
    $this->tags->add($tag);
  }

  public function removeTag(Tag $tag)
  {
    $this->tags->removeElement($tag);
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
   * @return Task
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
   * @return Task
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
