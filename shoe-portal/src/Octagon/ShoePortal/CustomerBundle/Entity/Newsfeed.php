<?php

namespace Octagon\ShoePortal\CustomerBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;

/**
 * Newsfeed
 *
 * @ORM\Table(name="Newsfeed", indexes={@ORM\Index(name="fk_Newsfeed_Categories1_idx", columns={"idCategories"}), @ORM\Index(name="fk_Newsfeed_User1_idx", columns={"idOwner"})})
 * @ORM\Entity
 */
class Newsfeed {

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
    private $idNewsfeed;

    /**
     * @var \Octagon\ShoePortal\CustomerBundle\Entity\User
     * 
     * @ORM\ManyToOne(targetEntity="Octagon\ShoePortal\CustomerBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idOwner", referencedColumnName="idUser")
     * })
     */
    private $idOwner;

    /**
     * @var \Octagon\ShoePortal\CustomerBundle\Entity\Categories
     * @Assert\NotNull()
     * @ORM\ManyToOne(targetEntity="Octagon\ShoePortal\CustomerBundle\Entity\Categories")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCategories", referencedColumnName="idCategories")
     * })
     */
    private $idCategories;

    /**
     * Set tile
     *
     * @param string $tile
     * @return Newsfeed
     */
    public function setTile($tile) {
        $this->tile = $tile;

        return $this;
    }

    /**
     * Get tile
     *
     * @return string 
     */
    public function getTile() {
        return $this->tile;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return Newsfeed
     */
    public function setText($text) {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText() {
        return $this->text;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Newsfeed
     */
    public function setDate($date) {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate() {
        return $this->date;
    }

    /**
     * Get idNewsfeed
     *
     * @return integer 
     */
    public function getIdNewsfeed() {
        return $this->idNewsfeed;
    }

    /**
     * Set idNewsfeed
     *
     * @return Newsfeed 
     */
    public function setIdNewsfeed($idNewsfeed) {
        $this->idNewsfeed = $idNewsfeed;
        return $this;
    }

    /**
     * Set idOwner
     *
     * @param \Octagon\ShoePortal\CustomerBundle\Entity\User $idOwner
     * @return Newsfeed
     */
    public function setIdOwner(\Octagon\ShoePortal\CustomerBundle\Entity\User $idOwner = null) {
        $this->idOwner = $idOwner;

        return $this;
    }

    /**
     * Get idOwner
     *
     * @return \Octagon\ShoePortal\CustomerBundle\Entity\User 
     */
    public function getIdOwner() {
        return $this->idOwner;
    }

    /**
     * Set idCategories
     *
     * @param \Octagon\ShoePortal\CustomerBundle\Entity\Categories $idCategories
     * @return Newsfeed
     */
    public function setIdcategories(\Octagon\ShoePortal\CustomerBundle\Entity\Categories $idCategories = null) {
        $this->idCategories = $idCategories;

        return $this;
    }

    /**
     * Get idCategories
     *
     * @return \Octagon\ShoePortal\CustomerBundle\Entity\Categories 
     */
    public function getIdCategories() {
        return $this->idCategories;
    }

    /**
     * Get BASE64 of idNewsfeed
     *
     * @return string 
     */
    public function getIdNewsfeedHash() {
        return base64_encode($this->idNewsfeed);
    }

}
