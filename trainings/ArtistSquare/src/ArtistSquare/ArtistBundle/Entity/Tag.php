<?php

namespace ArtistSquare\ArtistBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tag
 *
 * @ORM\Table(name="Tag")
 * @ORM\Entity
 */
class Tag
{
    /**
     * @var string
     *
     * @ORM\Column(name="tag", type="string", length=30, nullable=false)
     */
    private $tag;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="ArtistSquare\ArtistBundle\Entity\Picture", inversedBy="tag")
     * @ORM\JoinTable(name="picturetag",
     *   joinColumns={
     *     @ORM\JoinColumn(name="tag", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="picture", referencedColumnName="id")
     *   }
     * )
     */
    private $picture;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="ArtistSquare\ArtistBundle\Entity\Gallery", mappedBy="tag")
     */
    private $gallery;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="ArtistSquare\ArtistBundle\Entity\Article", inversedBy="tag")
     * @ORM\JoinTable(name="articletag",
     *   joinColumns={
     *     @ORM\JoinColumn(name="tag", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="article", referencedColumnName="id")
     *   }
     * )
     */
    private $article;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->picture = new \Doctrine\Common\Collections\ArrayCollection();
        $this->gallery = new \Doctrine\Common\Collections\ArrayCollection();
        $this->article = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set tag
     *
     * @param string $tag
     * @return Tag
     */
    public function setTag($tag)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get tag
     *
     * @return string 
     */
    public function getTag()
    {
        return $this->tag;
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
     * Add picture
     *
     * @param \ArtistSquare\ArtistBundle\Entity\Picture $picture
     * @return Tag
     */
    public function addPicture(\ArtistSquare\ArtistBundle\Entity\Picture $picture)
    {
        $this->picture[] = $picture;

        return $this;
    }

    /**
     * Remove picture
     *
     * @param \ArtistSquare\ArtistBundle\Entity\Picture $picture
     */
    public function removePicture(\ArtistSquare\ArtistBundle\Entity\Picture $picture)
    {
        $this->picture->removeElement($picture);
    }

    /**
     * Get picture
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Add gallery
     *
     * @param \ArtistSquare\ArtistBundle\Entity\Gallery $gallery
     * @return Tag
     */
    public function addGallery(\ArtistSquare\ArtistBundle\Entity\Gallery $gallery)
    {
        $this->gallery[] = $gallery;

        return $this;
    }

    /**
     * Remove gallery
     *
     * @param \ArtistSquare\ArtistBundle\Entity\Gallery $gallery
     */
    public function removeGallery(\ArtistSquare\ArtistBundle\Entity\Gallery $gallery)
    {
        $this->gallery->removeElement($gallery);
    }

    /**
     * Get gallery
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGallery()
    {
        return $this->gallery;
    }

    /**
     * Add article
     *
     * @param \ArtistSquare\ArtistBundle\Entity\Article $article
     * @return Tag
     */
    public function addArticle(\ArtistSquare\ArtistBundle\Entity\Article $article)
    {
        $this->article[] = $article;

        return $this;
    }

    /**
     * Remove article
     *
     * @param \ArtistSquare\ArtistBundle\Entity\Article $article
     */
    public function removeArticle(\ArtistSquare\ArtistBundle\Entity\Article $article)
    {
        $this->article->removeElement($article);
    }

    /**
     * Get article
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getArticle()
    {
        return $this->article;
    }
}
