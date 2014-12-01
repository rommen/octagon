<?php

namespace Octagon\ShoePortal\CustomerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Statistics
 *
 * @ORM\Table(name="Statistics", indexes={@ORM\Index(name="fk_Statistics_Categories1_idx", columns={"idCategories"})})
 * @ORM\Entity
 */
class Statistics
{
    /**
     * @var string
     *
     * @ORM\Column(name="tile", type="string", length=145, nullable=false)
     */
    private $tile;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text", nullable=false)
     */
    private $text;

    /**
     * @var integer
     *
     * @ORM\Column(name="idStatistics", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idstatistics;

    /**
     * @var \Octagon\ShoePortal\CustomerBundle\Entity\Categories
     *
     * @ORM\ManyToOne(targetEntity="Octagon\ShoePortal\CustomerBundle\Entity\Categories")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCategories", referencedColumnName="idCategories")
     * })
     */
    private $idcategories;



    /**
     * Set tile
     *
     * @param string $tile
     * @return Statistics
     */
    public function setTile($tile)
    {
        $this->tile = $tile;

        return $this;
    }

    /**
     * Get tile
     *
     * @return string 
     */
    public function getTile()
    {
        return $this->tile;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return Statistics
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
     * Get idstatistics
     *
     * @return integer 
     */
    public function getIdstatistics()
    {
        return $this->idstatistics;
    }

    /**
     * Set idcategories
     *
     * @param \Octagon\ShoePortal\CustomerBundle\Entity\Categories $idcategories
     * @return Statistics
     */
    public function setIdcategories(\Octagon\ShoePortal\CustomerBundle\Entity\Categories $idcategories = null)
    {
        $this->idcategories = $idcategories;

        return $this;
    }

    /**
     * Get idcategories
     *
     * @return \Octagon\ShoePortal\CustomerBundle\Entity\Categories 
     */
    public function getIdcategories()
    {
        return $this->idcategories;
    }
}
