<?php

namespace Octagon\ShoePortal\CustomerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comments
 *
 * @ORM\Table(name="Comments", indexes={@ORM\Index(name="fk_Comments_User1_idx", columns={"idOwner"}), @ORM\Index(name="fk_Comments_User2_idx", columns={"idSeller"}), @ORM\Index(name="fk_Comments_Shoe1_idx", columns={"idShoe"})})
 * @ORM\Entity
 */
class Comments
{
    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text", nullable=false)
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
     * @ORM\Column(name="idComments", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcomments;

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
     * @var \Octagon\ShoePortal\CustomerBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Octagon\ShoePortal\CustomerBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idOwner", referencedColumnName="idUser")
     * })
     */
    private $idowner;

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
     * Set text
     *
     * @param string $text
     * @return Comments
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
     * @return Comments
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
     * Get idcomments
     *
     * @return integer 
     */
    public function getIdcomments()
    {
        return $this->idcomments;
    }

    /**
     * Set idseller
     *
     * @param \Octagon\ShoePortal\CustomerBundle\Entity\User $idseller
     * @return Comments
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
     * Set idowner
     *
     * @param \Octagon\ShoePortal\CustomerBundle\Entity\User $idowner
     * @return Comments
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
     * Set idshoe
     *
     * @param \Octagon\ShoePortal\CustomerBundle\Entity\Shoe $idshoe
     * @return Comments
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
