<?php

namespace Octagon\ShoePortal\CustomerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mailbox
 *
 * @ORM\Table(name="Mailbox", indexes={@ORM\Index(name="fk_Mailbox_User1_idx", columns={"idSender"}), @ORM\Index(name="fk_Mailbox_User2_idx", columns={"idReceiver"})})
 * @ORM\Entity
 */
class Mailbox
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=145, nullable=false)
     */
    private $title;

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
     * @var boolean
     *
     * @ORM\Column(name="read", type="boolean", nullable=true)
     */
    private $read;

    /**
     * @var boolean
     *
     * @ORM\Column(name="deleteBySender", type="boolean", nullable=true)
     */
    private $deletebysender;

    /**
     * @var boolean
     *
     * @ORM\Column(name="deleteyReceiver", type="boolean", nullable=true)
     */
    private $deleteyreceiver;

    /**
     * @var integer
     *
     * @ORM\Column(name="idMailbox", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmailbox;

    /**
     * @var \Octagon\ShoePortal\CustomerBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Octagon\ShoePortal\CustomerBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idReceiver", referencedColumnName="idUser")
     * })
     */
    private $idreceiver;

    /**
     * @var \Octagon\ShoePortal\CustomerBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Octagon\ShoePortal\CustomerBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idSender", referencedColumnName="idUser")
     * })
     */
    private $idsender;



    /**
     * Set title
     *
     * @param string $title
     * @return Mailbox
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
     * Set text
     *
     * @param string $text
     * @return Mailbox
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
     * @return Mailbox
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
     * Set read
     *
     * @param boolean $read
     * @return Mailbox
     */
    public function setRead($read)
    {
        $this->read = $read;

        return $this;
    }

    /**
     * Get read
     *
     * @return boolean 
     */
    public function getRead()
    {
        return $this->read;
    }

    /**
     * Set deletebysender
     *
     * @param boolean $deletebysender
     * @return Mailbox
     */
    public function setDeletebysender($deletebysender)
    {
        $this->deletebysender = $deletebysender;

        return $this;
    }

    /**
     * Get deletebysender
     *
     * @return boolean 
     */
    public function getDeletebysender()
    {
        return $this->deletebysender;
    }

    /**
     * Set deleteyreceiver
     *
     * @param boolean $deleteyreceiver
     * @return Mailbox
     */
    public function setDeleteyreceiver($deleteyreceiver)
    {
        $this->deleteyreceiver = $deleteyreceiver;

        return $this;
    }

    /**
     * Get deleteyreceiver
     *
     * @return boolean 
     */
    public function getDeleteyreceiver()
    {
        return $this->deleteyreceiver;
    }

    /**
     * Get idmailbox
     *
     * @return integer 
     */
    public function getIdmailbox()
    {
        return $this->idmailbox;
    }

    /**
     * Set idreceiver
     *
     * @param \Octagon\ShoePortal\CustomerBundle\Entity\User $idreceiver
     * @return Mailbox
     */
    public function setIdreceiver(\Octagon\ShoePortal\CustomerBundle\Entity\User $idreceiver = null)
    {
        $this->idreceiver = $idreceiver;

        return $this;
    }

    /**
     * Get idreceiver
     *
     * @return \Octagon\ShoePortal\CustomerBundle\Entity\User 
     */
    public function getIdreceiver()
    {
        return $this->idreceiver;
    }

    /**
     * Set idsender
     *
     * @param \Octagon\ShoePortal\CustomerBundle\Entity\User $idsender
     * @return Mailbox
     */
    public function setIdsender(\Octagon\ShoePortal\CustomerBundle\Entity\User $idsender = null)
    {
        $this->idsender = $idsender;

        return $this;
    }

    /**
     * Get idsender
     *
     * @return \Octagon\ShoePortal\CustomerBundle\Entity\User 
     */
    public function getIdsender()
    {
        return $this->idsender;
    }
}
