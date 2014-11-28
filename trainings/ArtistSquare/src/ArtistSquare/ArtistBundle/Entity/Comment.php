<?php

namespace ArtistSquare\ArtistBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comment
 *
 * @ORM\Table(name="Comment", indexes={@ORM\Index(name="user_idx", columns={"owner"}), @ORM\Index(name="pic_idx", columns={"picture"}), @ORM\Index(name="fk_Comment_Article1_idx", columns={"article"}), @ORM\Index(name="fk_Comment_Gallery1_idx", columns={"gallery"}), @ORM\Index(name="fk_Comment_User1_idx", columns={"deleter"})})
 * @ORM\Entity
 */
class Comment
{
    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string", length=250, nullable=false)
     */
    private $text;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create", type="datetime", nullable=false)
     */
    private $create;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deleted", type="datetime", nullable=true)
     */
    private $deleted;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \ArtistSquare\ArtistBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="ArtistSquare\ArtistBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="deleter", referencedColumnName="id")
     * })
     */
    private $deleter;

    /**
     * @var \ArtistSquare\ArtistBundle\Entity\Gallery
     *
     * @ORM\ManyToOne(targetEntity="ArtistSquare\ArtistBundle\Entity\Gallery")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="gallery", referencedColumnName="id")
     * })
     */
    private $gallery;

    /**
     * @var \ArtistSquare\ArtistBundle\Entity\Article
     *
     * @ORM\ManyToOne(targetEntity="ArtistSquare\ArtistBundle\Entity\Article")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="article", referencedColumnName="id")
     * })
     */
    private $article;

    /**
     * @var \ArtistSquare\ArtistBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="ArtistSquare\ArtistBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="owner", referencedColumnName="id")
     * })
     */
    private $owner;

    /**
     * @var \ArtistSquare\ArtistBundle\Entity\Picture
     *
     * @ORM\ManyToOne(targetEntity="ArtistSquare\ArtistBundle\Entity\Picture")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="picture", referencedColumnName="id")
     * })
     */
    private $picture;



    /**
     * Set text
     *
     * @param string $text
     * @return Comment
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
     * Set create
     *
     * @param \DateTime $create
     * @return Comment
     */
    public function setCreate($create)
    {
        $this->create = $create;

        return $this;
    }

    /**
     * Get create
     *
     * @return \DateTime 
     */
    public function getCreate()
    {
        return $this->create;
    }

    /**
     * Set deleted
     *
     * @param \DateTime $deleted
     * @return Comment
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * Get deleted
     *
     * @return \DateTime 
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set deleter
     *
     * @param \ArtistSquare\ArtistBundle\Entity\User $deleter
     * @return Comment
     */
    public function setDeleter(\ArtistSquare\ArtistBundle\Entity\User $deleter = null)
    {
        $this->deleter = $deleter;

        return $this;
    }

    /**
     * Get deleter
     *
     * @return \ArtistSquare\ArtistBundle\Entity\User 
     */
    public function getDeleter()
    {
        return $this->deleter;
    }

    /**
     * Set gallery
     *
     * @param \ArtistSquare\ArtistBundle\Entity\Gallery $gallery
     * @return Comment
     */
    public function setGallery(\ArtistSquare\ArtistBundle\Entity\Gallery $gallery = null)
    {
        $this->gallery = $gallery;

        return $this;
    }

    /**
     * Get gallery
     *
     * @return \ArtistSquare\ArtistBundle\Entity\Gallery 
     */
    public function getGallery()
    {
        return $this->gallery;
    }

    /**
     * Set article
     *
     * @param \ArtistSquare\ArtistBundle\Entity\Article $article
     * @return Comment
     */
    public function setArticle(\ArtistSquare\ArtistBundle\Entity\Article $article = null)
    {
        $this->article = $article;

        return $this;
    }

    /**
     * Get article
     *
     * @return \ArtistSquare\ArtistBundle\Entity\Article 
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * Set owner
     *
     * @param \ArtistSquare\ArtistBundle\Entity\User $owner
     * @return Comment
     */
    public function setOwner(\ArtistSquare\ArtistBundle\Entity\User $owner = null)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return \ArtistSquare\ArtistBundle\Entity\User 
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set picture
     *
     * @param \ArtistSquare\ArtistBundle\Entity\Picture $picture
     * @return Comment
     */
    public function setPicture(\ArtistSquare\ArtistBundle\Entity\Picture $picture = null)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return \ArtistSquare\ArtistBundle\Entity\Picture 
     */
    public function getPicture()
    {
        return $this->picture;
    }
}
