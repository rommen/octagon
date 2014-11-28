<?php

namespace ArtistSquare\ArtistBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gallery
 *
 * @ORM\Table(name="Gallery", indexes={@ORM\Index(name="idx_gallery_owner", columns={"owner"}), @ORM\Index(name="fk_gallery_category1_idx", columns={"category_id"})})
 * @ORM\Entity
 */
class Gallery
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean", nullable=false)
     */
    private $active;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=false)
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modified", type="datetime", nullable=true)
     */
    private $modified;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=250, nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="tile", type="integer", nullable=true)
     */
    private $tile;

    /**
     * @var string
     *
     * @ORM\Column(name="block_reason", type="text", nullable=true)
     */
    private $blockReason;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    public function setId($id)
    {
        $this->id = $id;
		return $this;
    }
	

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
     * @var \ArtistSquare\ArtistBundle\Entity\Category
     *
     * @ORM\ManyToOne(targetEntity="ArtistSquare\ArtistBundle\Entity\Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * })
     */
    private $category;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="ArtistSquare\ArtistBundle\Entity\Tag", inversedBy="gallery")
     * @ORM\JoinTable(name="gallery_has_tag",
     *   joinColumns={
     *     @ORM\JoinColumn(name="gallery", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="tag", referencedColumnName="id")
     *   }
     * )
     */
    private $tag;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="ArtistSquare\ArtistBundle\Entity\Picture", inversedBy="gallery")
     * @ORM\JoinTable(name="gallerypicture",
     *   joinColumns={
     *     @ORM\JoinColumn(name="gallery", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="picture", referencedColumnName="id")
     *   }
     * )
     */
    private $picture;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tag = new \Doctrine\Common\Collections\ArrayCollection();
        $this->picture = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set name
     *
     * @param string $name
     * @return Gallery
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return Gallery
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Gallery
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set modified
     *
     * @param \DateTime $modified
     * @return Gallery
     */
    public function setModified($modified)
    {
        $this->modified = $modified;

        return $this;
    }

    /**
     * Get modified
     *
     * @return \DateTime 
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Gallery
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set tile
     *
     * @param integer $tile
     * @return Gallery
     */
    public function setTile($tile)
    {
        $this->tile = $tile;

        return $this;
    }

    /**
     * Get tile
     *
     * @return integer 
     */
    public function getTile()
    {
        return $this->tile;
    }

    /**
     * Set blockReason
     *
     * @param string $blockReason
     * @return Gallery
     */
    public function setBlockReason($blockReason)
    {
        $this->blockReason = $blockReason;

        return $this;
    }

    /**
     * Get blockReason
     *
     * @return string 
     */
    public function getBlockReason()
    {
        return $this->blockReason;
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
     * Get id as base64
     *
     * @return string 
     */
    public function getHashId()
    {
        return base64_encode($this->id);
    }
    
    /**
     * Set owner
     *
     * @param \ArtistSquare\ArtistBundle\Entity\User $owner
     * @return Gallery
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
     * Set category
     *
     * @param \ArtistSquare\ArtistBundle\Entity\Category $category
     * @return Gallery
     */
    public function setCategory(\ArtistSquare\ArtistBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \ArtistSquare\ArtistBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add tag
     *
     * @param \ArtistSquare\ArtistBundle\Entity\Tag $tag
     * @return Gallery
     */
    public function addTag(\ArtistSquare\ArtistBundle\Entity\Tag $tag)
    {
        $this->tag[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     * @param \ArtistSquare\ArtistBundle\Entity\Tag $tag
     */
    public function removeTag(\ArtistSquare\ArtistBundle\Entity\Tag $tag)
    {
        $this->tag->removeElement($tag);
    }

    /**
     * Get tag
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Add picture
     *
     * @param \ArtistSquare\ArtistBundle\Entity\Picture $picture
     * @return Gallery
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
}
