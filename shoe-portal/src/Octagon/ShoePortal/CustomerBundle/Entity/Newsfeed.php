<?php

namespace Octagon\ShoePortal\CustomerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Newsfeed
 *
 * @ORM\Table(name="Newsfeed", indexes={@ORM\Index(name="fk_Newsfeed_Categories1_idx", columns={"idCategories"}), @ORM\Index(name="fk_Newsfeed_User1_idx", columns={"idOwner"})})
 * @ORM\Entity
 */
class Newsfeed
{
    /**
     * @var string
     *
     * @ORM\Column(name="tile", type="string", length=145, nullable=false)
     */
    private $tile;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text", nullable=true)
     */
    private $text;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="idNewsfeed", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idnewsfeed;

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
     * Set tile
     *
     * @param string $tile
     * @return Newsfeed
     */
    public function setTile($tile)
    {
        $this->tile = $tile;

        return $this;
    }

    /**
     * Get tile
     *
     * @return string 
     */
    public function getTile()
    {
        return $this->tile;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return Newsfeed
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
     * Set date
     *
     * @param \DateTime $date
     * @return Newsfeed
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Get idnewsfeed
     *
     * @return integer 
     */
    public function getIdnewsfeed()
    {
        return $this->idnewsfeed;
    }

    /**
     * Set idowner
     *
     * @param \Octagon\ShoePortal\CustomerBundle\Entity\User $idowner
     * @return Newsfeed
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
     * @return Newsfeed
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
