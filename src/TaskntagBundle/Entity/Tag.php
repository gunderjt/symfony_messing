<?php
// TaskntagBundle/Entity/Tag.php
namespace TaskntagBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Tag
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class Tag
{
  /**
   * @var integer
   *
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  public $id;

  /**
   * @var string
   *
   * @ORM\Column(name="name", type="string", length=255)
   */
  public $name;

  /**
   * Bidirectional - Many tags have many tasks (INVERSE SIDE)
   *
   * @ORM\ManyToMany(targetEntity="Task", mappedBy="tags")
   */
  public $taskstaggedby;

  public function __construct()
  {
    $this->taskstaggedby = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Tag
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add taskstaggedby
     *
     * @param \TaskntagBundle\Entity\Task $taskstaggedby
     * @return Tag
     */
    public function addTaskstaggedby(\TaskntagBundle\Entity\Task $taskstaggedby)
    {
        $this->taskstaggedby[] = $taskstaggedby;

        return $this;
    }

    /**
     * Remove taskstaggedby
     *
     * @param \TaskntagBundle\Entity\Task $taskstaggedby
     */
    public function removeTaskstaggedby(\TaskntagBundle\Entity\Task $taskstaggedby)
    {
        $this->taskstaggedby->removeElement($taskstaggedby);
    }

    /**
     * Get taskstaggedby
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTaskstaggedby()
    {
        return $this->taskstaggedby;
    }
}
