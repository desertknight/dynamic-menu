<?php

namespace Application\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Menu
 *
 * @ORM\Table(name="menus")
 * @ORM\Entity
 */
class Menu
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
     *
     * @var Menu
     * 
     * @ORM\ManyToOne(targetEntity="\Application\MainBundle\Entity\Menu", inversedBy="children", cascade={"persist"})
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $parent;

    /**
     *
     * @var type 
     * 
     * @ORM\OneToMany(targetEntity="\Application\MainBundle\Entity\Menu", mappedBy="parent", orphanRemoval=true, cascade={"persist"})
     */
    protected $children;

    /**
     *
     * @var string
     * 
     * @ORM\Column(name="title", type="string")
     */
    protected $title;

    /**
     *
     * @var string
     * 
     * @ORM\Column(name="color", type="string")
     */
    protected $color;

    /**
     *
     * @var \DateTime
     * 
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    protected $createdAt;

    /**
     *
     * @var \DateTime
     * 
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    protected $updatedAt;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
        $this->updatedAt = new \DateTime();
        if ($this->createdAt === null) {
            $this->createdAt = new \DateTime();
        }
    }

    public function __toString()
    {
        return (string) $this->getTitle();
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
     * Set title
     *
     * @param string $title
     *
     * @return Menu
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
     * Set color
     *
     * @param string $color
     *
     * @return Menu
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Menu
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
     *
     * @return Menu
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
     * Set parent
     *
     * @param \Application\MainBundle\Entity\Menu $parent
     *
     * @return Menu
     */
    public function setParent(\Application\MainBundle\Entity\Menu $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \Application\MainBundle\Entity\Menu
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Add child
     *
     * @param \Application\MainBundle\Entity\Menu $child
     *
     * @return Menu
     */
    public function addChild(\Application\MainBundle\Entity\Menu $child)
    {
        $this->children[] = $child;

        return $this;
    }

    /**
     * Remove child
     *
     * @param \Application\MainBundle\Entity\Menu $child
     */
    public function removeChild(\Application\MainBundle\Entity\Menu $child)
    {
        $this->children->removeElement($child);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChildren()
    {
        return $this->children;
    }

}
