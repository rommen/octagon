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
    private $idComments;

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
     * @var \Octagon\ShoePortal\CustomerBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Octagon\ShoePortal\CustomerBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idOwner", referencedColumnName="idUser")
     * })
     */
    private $idOwner;

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
     * @var boolean
     *
     * @ORM\Column(name="reported", type="boolean", nullable=false)
     */
    private $reported;



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
     * Get idComments
     *
     * @return integer 
     */
    public function getIdComments()
    {
        return $this->idComments;
    }

    /**
     * Set seller
     *
     * @param \Octagon\ShoePortal\CustomerBundle\Entity\User $seller
     * @return Comments
     */
    public function setIdSeller(\Octagon\ShoePortal\CustomerBundle\Entity\User $idSeller = null)
    {
        $this->idSeller = $idSeller;

        return $this;
    }

    /**
     * Get seller
     *
     * @return \Octagon\ShoePortal\CustomerBundle\Entity\User 
     */
    public function getIdSeller()
    {
        return $this->idSeller;
    }

    /**
     * Set owner
     *
     * @param \Octagon\ShoePortal\CustomerBundle\Entity\User $owner
     * @return Comments
     */
    public function setIdOwner(\Octagon\ShoePortal\CustomerBundle\Entity\User $idOwner = null)
    {
        $this->idOwner = $idOwner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return \Octagon\ShoePortal\CustomerBundle\Entity\User 
     */
    public function getIdOwner()
    {
        return $this->idOwner;
    }

    /**
     * Set shoe
     *
     * @param \Octagon\ShoePortal\CustomerBundle\Entity\Shoe $idShoe
     * @return Comments
     */
    public function setIdShoe(\Octagon\ShoePortal\CustomerBundle\Entity\Shoe $idShoe = null)
    {
        $this->idShoe = $idShoe;

        return $this;
    }

    /**
     * Get shoe
     *
     * @return \Octagon\ShoePortal\CustomerBundle\Entity\Shoe 
     */
    public function getIdShoe()
    {
        return $this->idShoe;
    }
    
    
    /**
     * Set reported
     *
     * @param boolean $reported
     * @return Mailbox
     */
    public function setReported($reported) {
        $this->reported = $reported;

        return $this;
    }

    /**
     * Get reported
     *
     * @return boolean 
     */
    public function getReported() {
        return $this->reported;
    }
}
