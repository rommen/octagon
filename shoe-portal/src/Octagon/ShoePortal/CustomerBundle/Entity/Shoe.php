<?php

namespace Octagon\ShoePortal\CustomerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Shoe
 *
 * @ORM\Table(name="Shoe", indexes={@ORM\Index(name="fk_Shoe_Categories_idx", columns={"idCategories"}), @ORM\Index(name="fk_Shoe_User1_idx", columns={"idOwner"})})
 * @ORM\Entity
 */
class Shoe
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=145, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=145, nullable=false)
     */
    private $color;

    /**
     * @var string
     *
     * @ORM\Column(name="size", type="decimal", precision=3, scale=1, nullable=false)
     */
    private $size;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text", nullable=false)
     */
    private $text;

    /**
     * @var string
     *
     * @ORM\Column(name="brand", type="string", length=45, nullable=false)
     */
    private $brand;

    /**
     * @var string
     *
     * @ORM\Column(name="prize", type="decimal", precision=5, scale=2, nullable=true)
     */
    private $prize;

    /**
     * @var string
     *
     * @ORM\Column(name="sportstar", type="string", length=45, nullable=true)
     */
    private $sportstar;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="year", type="date", nullable=true)
     */
    private $year;

    /**
     * @var string
     *
     * @ORM\Column(name="edition", type="string", length=20, nullable=true)
     */
    private $edition;

    /**
     * @var string
     *
     * @ORM\Column(name="extension", type="string", length=4, nullable=true)
     */
    private $extension;

    /**
     * @var integer
     *
     * @ORM\Column(name="idShoe", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idshoe;

    /**
     * @var \Octagon\ShoePortal\CustomerBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Octagon\ShoePortal\CustomerBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idOwner", referencedColumnName="idUser")
     * })
     */
    private $idowner;

    /**
     * @var \Octagon\ShoePortal\CustomerBundle\Entity\Categories
     *
     * @ORM\ManyToOne(targetEntity="Octagon\ShoePortal\CustomerBundle\Entity\Categories")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCategories", referencedColumnName="idCategories")
     * })
     */
    private $idcategories;



    /**
     * Set name
     *
     * @param string $name
     * @return Shoe
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
     * Set color
     *
     * @param string $color
     * @return Shoe
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
     * Set size
     *
     * @param string $size
     * @return Shoe
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return string 
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return Shoe
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set brand
     *
     * @param string $brand
     * @return Shoe
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return string 
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set prize
     *
     * @param string $prize
     * @return Shoe
     */
    public function setPrize($prize)
    {
        $this->prize = $prize;

        return $this;
    }

    /**
     * Get prize
     *
     * @return string 
     */
    public function getPrize()
    {
        return $this->prize;
    }

    /**
     * Set sportstar
     *
     * @param string $sportstar
     * @return Shoe
     */
    public function setSportstar($sportstar)
    {
        $this->sportstar = $sportstar;

        return $this;
    }

    /**
     * Get sportstar
     *
     * @return string 
     */
    public function getSportstar()
    {
        return $this->sportstar;
    }

    /**
     * Set year
     *
     * @param \DateTime $year
     * @return Shoe
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return \DateTime 
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set edition
     *
     * @param string $edition
     * @return Shoe
     */
    public function setEdition($edition)
    {
        $this->edition = $edition;

        return $this;
    }

    /**
     * Get edition
     *
     * @return string 
     */
    public function getEdition()
    {
        return $this->edition;
    }

    /**
     * Set extension
     *
     * @param string $extension
     * @return Shoe
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * Get extension
     *
     * @return string 
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * Get idshoe
     *
     * @return integer 
     */
    public function getIdshoe()
    {
        return $this->idshoe;
    }

    /**
     * Set idowner
     *
     * @param \Octagon\ShoePortal\CustomerBundle\Entity\User $idowner
     * @return Shoe
     */
    public function setIdowner(\Octagon\ShoePortal\CustomerBundle\Entity\User $idowner = null)
    {
        $this->idowner = $idowner;

        return $this;
    }

    /**
     * Get idowner
     *
     * @return \Octagon\ShoePortal\CustomerBundle\Entity\User 
     */
    public function getIdowner()
    {
        return $this->idowner;
    }

    /**
     * Set idcategories
     *
     * @param \Octagon\ShoePortal\CustomerBundle\Entity\Categories $idcategories
     * @return Shoe
     */
    public function setIdcategories(\Octagon\ShoePortal\CustomerBundle\Entity\Categories $idcategories = null)
    {
        $this->idcategories = $idcategories;

        return $this;
    }

    /**
     * Get idcategories
     *
     * @return \Octagon\ShoePortal\CustomerBundle\Entity\Categories 
     */
    public function getIdcategories()
    {
        return $this->idcategories;
    }
}
