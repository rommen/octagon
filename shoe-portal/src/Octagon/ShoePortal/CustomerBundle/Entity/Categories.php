<?php

namespace Octagon\ShoePortal\CustomerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categories
 *
 * @ORM\Table(name="Categories", indexes={@ORM\Index(name="fk_Categories_Categories1_idx", columns={"idParent"})})
 * @ORM\Entity
 */
class Categories
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="level", type="integer", nullable=true)
     */
    private $level;

    /**
     * @var integer
     *
     * @ORM\Column(name="idCategories", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcategories;

    /**
     * @var \Octagon\ShoePortal\CustomerBundle\Entity\Categories
     *
     * @ORM\ManyToOne(targetEntity="Octagon\ShoePortal\CustomerBundle\Entity\Categories")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idParent", referencedColumnName="idCategories")
     * })
     */
    private $idparent;



    /**
     * Set name
     *
     * @param string $name
     * @return Categories
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
     * Set level
     *
     * @param integer $level
     * @return Categories
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return integer 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Get idcategories
     *
     * @return integer 
     */
    public function getIdcategories()
    {
        return $this->idcategories;
    }

    /**
     * Set idparent
     *
     * @param \Octagon\ShoePortal\CustomerBundle\Entity\Categories $idparent
     * @return Categories
     */
    public function setIdparent(\Octagon\ShoePortal\CustomerBundle\Entity\Categories $idparent = null)
    {
        $this->idparent = $idparent;

        return $this;
    }

    /**
     * Get idparent
     *
     * @return \Octagon\ShoePortal\CustomerBundle\Entity\Categories 
     */
    public function getIdparent()
    {
        return $this->idparent;
    }
}
