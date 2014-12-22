<?php

namespace Octagon\ShoePortal\CustomerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mailbox
 *
 * @ORM\Table(name="Mailbox", indexes={@ORM\Index(name="fk_Mailbox_User1_idx", columns={"idSender"}), @ORM\Index(name="fk_Mailbox_User2_idx", columns={"idReceiver"})})
 * @ORM\Entity
 */
class Mailbox {

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
     * @ORM\Column(name="'read'", type="boolean", nullable=true)
     */
    private $read;

    /**
     * @var boolean
     *
     * @ORM\Column(name="deleteBySender", type="boolean", nullable=true)
     */
    private $deleteBySender;

    /**
     * @var boolean
     *
     * @ORM\Column(name="deleteyReceiver", type="boolean", nullable=true)
     */
    private $deleteByReceiver;

    /**
     * @var integer
     *
     * @ORM\Column(name="idMailbox", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMailbox;

    /**
     * @var \Octagon\ShoePortal\CustomerBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Octagon\ShoePortal\CustomerBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idReceiver", referencedColumnName="idUser")
     * })
     */
    private $idReceiver;

    /**
     * @var \Octagon\ShoePortal\CustomerBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Octagon\ShoePortal\CustomerBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idSender", referencedColumnName="idUser")
     * })
     */
    private $idSender;

    /**
     * Set title
     *
     * @param string $title
     * @return Mailbox
     */
    public function setTitle($title) {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return Mailbox
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
     * @return Mailbox
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
     * Set read
     *
     * @param boolean $read
     * @return Mailbox
     */
    public function setRead($read) {
        $this->read = $read;

        return $this;
    }

    /**
     * Get read
     *
     * @return boolean 
     */
    public function getRead() {
        return $this->read;
    }

    /**
     * Set deleteBySender
     *
     * @param boolean $deleteBySender
     * @return Mailbox
     */
    public function setDeleteBySender($deleteBySender) {
        $this->deleteBySender = $deleteBySender;

        return $this;
    }

    /**
     * Get deleteBySender
     *
     * @return boolean 
     */
    public function getDeleteBySender() {
        return $this->deleteBySender;
    }

    /**
     * Set deleteByReceiver
     *
     * @param boolean $deleteByReceiver
     * @return Mailbox
     */
    public function setDeleteyreceiver($deleteByReceiver) {
        $this->deleteByReceiver = $deleteByReceiver;

        return $this;
    }

    /**
     * Get deleteByReceiver
     *
     * @return boolean 
     */
    public function getDeleteByReceiver() {
        return $this->deleteByReceiver;
    }

    /**
     * Get idMailbox
     *
     * @return integer 
     */
    public function getIdMailbox() {
        return $this->idMailbox;
    }

    /**
     * Get base64 of idMailbox
     *
     * @return string 
     */
    public function getIdMailboxHash() {
        return base64_encode($this->idMailbox);
    }

    /**
     * Set idReceiver
     *
     * @param \Octagon\ShoePortal\CustomerBundle\Entity\User $idReceiver
     * @return Mailbox
     */
    public function setIdreceiver(\Octagon\ShoePortal\CustomerBundle\Entity\User $idReceiver = null) {
        $this->idReceiver = $idReceiver;

        return $this;
    }

    /**
     * Get idReceiver
     *
     * @return \Octagon\ShoePortal\CustomerBundle\Entity\User 
     */
    public function getIdReceiver() {
        return $this->idReceiver;
    }

    /**
     * Set idSender
     *
     * @param \Octagon\ShoePortal\CustomerBundle\Entity\User $idSender
     * @return Mailbox
     */
    public function setIdsender(\Octagon\ShoePortal\CustomerBundle\Entity\User $idSender = null) {
        $this->idSender = $idSender;

        return $this;
    }

    /**
     * Get idSender
     *
     * @return \Octagon\ShoePortal\CustomerBundle\Entity\User 
     */
    public function getIdsender() {
        return $this->idSender;
    }

}
