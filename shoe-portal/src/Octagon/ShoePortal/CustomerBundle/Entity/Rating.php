<?php

namespace Octagon\ShoePortal\CustomerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rating
 *
 * @ORM\Table(name="Rating", indexes={@ORM\Index(name="fk_Rating_Shoe1_idx", columns={"idShoe"}), @ORM\Index(name="fk_Rating_User1_idx", columns={"idSeller"}), @ORM\Index(name="fk_Rating_User2_idx", columns={"idOwner"})})
 * @ORM\Entity
 */
class Rating
{
    /**
     * @var boolean
     *
     * @ORM\Column(name="value", type="boolean", nullable=false)
     */
    private $value;

    /**
     * @var integer
     *
     * @ORM\Column(name="idRating", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idrating;

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
     * @var \Octagon\ShoePortal\CustomerBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Octagon\ShoePortal\CustomerBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idSeller", referencedColumnName="idUser")
     * })
     */
    private $idseller;

    /**
     * @var \Octagon\ShoePortal\CustomerBundle\Entity\Shoe
     *
     * @ORM\ManyToOne(targetEntity="Octagon\ShoePortal\CustomerBundle\Entity\Shoe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idShoe", referencedColumnName="idShoe")
     * })
     */
    private $idshoe;



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
     * Get idrating
     *
     * @return integer 
     */
    public function getIdrating()
    {
        return $this->idrating;
    }

    /**
     * Set idowner
     *
     * @param \Octagon\ShoePortal\CustomerBundle\Entity\User $idowner
     * @return Rating
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
     * Set idseller
     *
     * @param \Octagon\ShoePortal\CustomerBundle\Entity\User $idseller
     * @return Rating
     */
    public function setIdseller(\Octagon\ShoePortal\CustomerBundle\Entity\User $idseller = null)
    {
        $this->idseller = $idseller;

        return $this;
    }

    /**
     * Get idseller
     *
     * @return \Octagon\ShoePortal\CustomerBundle\Entity\User 
     */
    public function getIdseller()
    {
        return $this->idseller;
    }

    /**
     * Set idshoe
     *
     * @param \Octagon\ShoePortal\CustomerBundle\Entity\Shoe $idshoe
     * @return Rating
     */
    public function setIdshoe(\Octagon\ShoePortal\CustomerBundle\Entity\Shoe $idshoe = null)
    {
        $this->idshoe = $idshoe;

        return $this;
    }

    /**
     * Get idshoe
     *
     * @return \Octagon\ShoePortal\CustomerBundle\Entity\Shoe 
     */
    public function getIdshoe()
    {
        return $this->idshoe;
    }
}
