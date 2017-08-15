<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Shelf
 *
 * @ORM\Table(name="shelf")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ShelfRepository")
 */
class Shelf
{

    /**
     * @ORM\ManyToOne(targetEntity="Shelving", inversedBy="shelfs")
     * @ORM\JoinColumn(name="shelving_id", referencedColumnName="id")
     */
    private $shelving;

    /**
     * @ORM\OneToMany(targetEntity="Item", mappedBy="shelf")
     */
    private $items;

    public function __construct()
    {
        $this->items = new ArrayCollection();
    }


    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */


    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="holding_capacity", type="integer")
     */
    private $holdingCapacity;

    /**
     * @var string
     *
     * @ORM\Column(name="shelf_name", type="string", length=10)
     */
    private $shelfName;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set holdingCapacity
     *
     * @param integer $holdingCapacity
     *
     * @return Shelf
     */
    public function setHoldingCapacity($holdingCapacity)
    {
        $this->holdingCapacity = $holdingCapacity;

        return $this;
    }

    /**
     * Get holdingCapacity
     *
     * @return int
     */
    public function getHoldingCapacity()
    {
        return $this->holdingCapacity;
    }

    /**
     * Set shelfName
     *
     * @param string $shelfName
     *
     * @return Shelf
     */
    public function setShelfName($shelfName)
    {
        $this->shelfName = $shelfName;

        return $this;
    }

    /**
     * Get shelfName
     *
     * @return string
     */
    public function getShelfName()
    {
        return $this->shelfName;
    }

    /**
     * Set shelving
     *
     * @param \AppBundle\Entity\Shelving $shelving
     *
     * @return Shelf
     */
    public function setShelving(\AppBundle\Entity\Shelving $shelving)
    {
        $this->shelving = $shelving;

        return $this;
    }

    /**
     * Get shelving
     *
     * @return \AppBundle\Entity\Shelving
     */
    public function getShelving()
    {
        return $this->shelving;
    }

    /**
     * Add item
     *
     * @param \AppBundle\Entity\Items $item
     *
     * @return Shelf
     */
    public function addItem(\AppBundle\Entity\Items $item)
    {
        $this->items[] = $item;

        return $this;
    }

    /**
     * Remove item
     *
     * @param \AppBundle\Entity\Items $item
     */
    public function removeItem(\AppBundle\Entity\Items $item)
    {
        $this->items->removeElement($item);
    }

    /**
     * Get items
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getItems()
    {
        return $this->items;
    }
}
