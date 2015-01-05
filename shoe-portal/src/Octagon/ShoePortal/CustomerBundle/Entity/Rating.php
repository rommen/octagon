<?php

namespace Octagon\ShoePortal\CustomerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Rating
 *
 * @ORM\Table(name="Rating", indexes={@ORM\Index(name="fk_Rating_Shoe1_idx", columns={"idShoe"}), @ORM\Index(name="fk_Rating_User1_idx", columns={"idSeller"}), @ORM\Index(name="fk_Rating_User2_idx", columns={"idOwner"})})
 * @ORM\Entity
 */
class Rating
{
    /**
     * @var integer
     * @Assert\Range(
     *      min = 0,
     *      max = 5,
     *      minMessage = "You must enter at least {{ limit }}",
     *      maxMessage = "You cannot enter more than {{ limit }}"
     * )
     * @ORM\Column(name="value", type="integer", nullable=false)
     */
    private $value;

    /**
     * @var integer
     *
     * @ORM\Column(name="idRating", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRating;

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
     * @var \Octagon\ShoePortal\CustomerBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Octagon\ShoePortal\CustomerBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idSeller", referencedColumnName="idUser")
     * })
     */
    private $idSeller;

    /**
     * @var \Octagon\ShoePortal\CustomerBundle\Entity\Shoe
     *
     * @ORM\ManyToOne(targetEntity="Octagon\ShoePortal\CustomerBundle\Entity\Shoe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idShoe", referencedColumnName="idShoe")
     * })
     */
    private $idShoe;



    /**
     * Set value
     *
     * @param boolean $value
     * @return Rating
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return boolean 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Get idRating
     *
     * @return integer 
     */
    public function getIdRating()
    {
        return $this->idRating;
    }

    /**
     * Set idOwner
     *
     * @param \Octagon\ShoePortal\CustomerBundle\Entity\User $idOwner
     * @return Rating
     */
    public function setIdOwner(\Octagon\ShoePortal\CustomerBundle\Entity\User $idOwner = null)
    {
        $this->idOwner = $idOwner;

        return $this;
    }

    /**
     * Get idOwner
     *
     * @return \Octagon\ShoePortal\CustomerBundle\Entity\User 
     */
    public function getIdOwner()
    {
        return $this->idOwner;
    }

    /**
     * Set idSeller
     *
     * @param \Octagon\ShoePortal\CustomerBundle\Entity\User $idSeller
     * @return Rating
     */
    public function setIdSeller(\Octagon\ShoePortal\CustomerBundle\Entity\User $idSeller = null)
    {
        $this->idSeller = $idSeller;

        return $this;
    }

    /**
     * Get idSeller
     *
     * @return \Octagon\ShoePortal\CustomerBundle\Entity\User 
     */
    public function getIdSeller()
    {
        return $this->idSeller;
    }

    /**
     * Set idShoe
     *
     * @param \Octagon\ShoePortal\CustomerBundle\Entity\Shoe $idShoe
     * @return Rating
     */
    public function setIdShoe(\Octagon\ShoePortal\CustomerBundle\Entity\Shoe $idShoe = null)
    {
        $this->idShoe = $idShoe;

        return $this;
    }

    /**
     * Get idShoe
     *
     * @return \Octagon\ShoePortal\CustomerBundle\Entity\Shoe 
     */
    public function getIdShoe()
    {
        return $this->idShoe;
    }
}
