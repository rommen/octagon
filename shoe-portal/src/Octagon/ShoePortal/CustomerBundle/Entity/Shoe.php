<?php

namespace Octagon\ShoePortal\CustomerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Shoe
 *
 * @ORM\Table(name="Shoe", indexes={@ORM\Index(name="fk_Shoe_Categories_idx", columns={"idCategories"}), @ORM\Index(name="fk_Shoe_User1_idx", columns={"idOwner"})})
 * @ORM\Entity
 */
class Shoe extends UploadableEntity {

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
     * @Assert\Range(
     *      min = 1,
     *      max = 99,
     *      minMessage = "You must enter least {{ limit }}",
     *      maxMessage = "You cannot enter more than {{ limit }}"
     * )
     *
     */
    private $size;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text", nullable=false)
     * 
     */
    private $text;

    /**
     * @var string
     *
     * @ORM\Column(name="brand", type="string", length=45, nullable=false)
     */
    private $brand;

    /**
     * @Assert\Range(
     *      min = 0,
     *      max = 999,
     *      minMessage = "You must enter least {{ limit }}",
     *      maxMessage = "You cannot enter more than {{ limit }}"
     * )
     * @var decimal
     * @ORM\Column(name="prize", type="decimal", precision=5, scale=2, nullable=true)
     */
    private $price = 0;

    /**
     * @var string
     *
     * @ORM\Column(name="sportstar", type="string", length=45, nullable=true)
     */
    private $sportstar;

    /**
     * @var integer
     * @Assert\Range(
     *      min = 1,
     *      max = 2155,
     *      minMessage = "You must enter least {{ limit }}",
     *      maxMessage = "You cannot enter more than {{ limit }}"
     * )
     * @ORM\Column(name="year", type="integer", nullable=true)
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
    private $idShoe;

    /**
     * @var \Octagon\ShoePortal\CustomerBundle\Entity\User
     * @Assert\NotNull()
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
     *
     * @var decimal
     */
    private $avgRate = 0;

    /**
     * Set name
     *
     * @param string $name
     * @return Shoe
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set color
     *
     * @param string $color
     * @return Shoe
     */
    public function setColor($color) {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string 
     */
    public function getColor() {
        return $this->color;
    }

    /**
     * Set size
     *
     * @param string $size
     * @return Shoe
     */
    public function setSize($size) {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return string 
     */
    public function getSize() {
        return $this->size;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return Shoe
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
     * Set brand
     *
     * @param string $brand
     * @return Shoe
     */
    public function setBrand($brand) {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return string 
     */
    public function getBrand() {
        return $this->brand;
    }

    /**
     * Set price
     *
     * @param string price
     * @return Shoe
     */
    public function setPrice($price) {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string 
     */
    public function getPrice() {
        return $this->price;
    }

    /**
     * Set sportstar
     *
     * @param string $sportstar
     * @return Shoe
     */
    public function setSportstar($sportstar) {
        $this->sportstar = $sportstar;

        return $this;
    }

    /**
     * Get sportstar
     *
     * @return string 
     */
    public function getSportstar() {
        return $this->sportstar;
    }

    /**
     * Set year
     *
     * @param \DateTime $year
     * @return Shoe
     */
    public function setYear($year) {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return \DateTime 
     */
    public function getYear() {
        return $this->year;
    }

    /**
     * Set edition
     *
     * @param string $edition
     * @return Shoe
     */
    public function setEdition($edition) {
        $this->edition = $edition;

        return $this;
    }

    /**
     * Get edition
     *
     * @return string 
     */
    public function getEdition() {
        return $this->edition;
    }

    /**
     * Set extension
     *
     * @param string $extension
     * @return Shoe
     */
    public function setExtension($extension) {
        $this->extension = $extension;

        return $this;
    }

    /**
     * Get extension
     *
     * @return string 
     */
    public function getExtension() {
        return $this->extension;
    }

    /**
     * Get idShoe
     *
     * @return integer 
     */
    public function getIdShoe() {
        return $this->idShoe;
    }

    /**
     * Set idShoe
     *
     * @param integer $idShoe
     * @return Shoe
     */
    public function setIdShoe($idShoe) {
        $this->idShoe = $idShoe;

        return $this;
    }

    /**
     * Get BASE64 of idShoe
     *
     * @return string 
     */
    public function getIdShoeHash() {
        return base64_encode($this->idShoe);
    }

    /**
     * Set idOwner
     *
     * @param \Octagon\ShoePortal\CustomerBundle\Entity\User $idOwner
     * @return Shoe
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
     * @return Shoe
     */
    public function setIdCategories(\Octagon\ShoePortal\CustomerBundle\Entity\Categories $idCategories = null) {
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
     * Get full image name, for example, User_1 or Shoe_2
     * @return string
     */
    public function getImageName() {
        return 'Shoe_' . $this->idShoe;
    }

    /**
     * Return image file extension, for example, jpeg, png or jpg
     * @return string
     */
    public function getFileExtension() {
        return $this->extension;
    }

    /**
     * Set file extension of the image
     */
    public function setFileExtension($extension) {
        $this->setExtension($extension);
    }

    public function __toString() {
        return $this->name == null ? "" : $this->name;
    }

    function getAvgRate() {
        return $this->avgRate;
    }

    function setAvgRate(decimal $avgRate) {
        $this->avgRate = $avgRate;
    }

}
