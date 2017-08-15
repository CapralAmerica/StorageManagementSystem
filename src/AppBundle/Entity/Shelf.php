<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Shelving;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Shelf
 *
 * @ORM\Table(name="shelf")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ShelfRepository")
 */
class Shelf
{
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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
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
     * Get shelfName
     *
     * @return string
     */
    public function getShelfName()
    {
        return $this->shelfName;
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
     * Get shelving
     *
     * @return Shelving
     */
    public function getShelving()
    {
        return $this->shelving;
    }

    /**
     * Set shelving
     *
     * @param Shelving $shelving
     *
     * @return Shelf
     */
    public function setShelving(Shelving $shelving)
    {
        $this->shelving = $shelving;

        return $this;
    }

    /**
     * Add item
     *
     * @param Item $item
     *
     * @return Shelf
     */
    public function addItem(Item $item)
    {
        $this->items[] = $item;

        return $this;
    }

    /**
     * Remove item
     *
     * @param Item $item
     */
    public function removeItem(Item $item)
    {
        $this->items->removeElement($item);
    }

    /**
     * Get items
     *
     * @return Collection
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @inheritdoc
     */
    public function __toString()
    {
        return "Selving:" . $this->getShelving()->getName() . " Shelf:" . $this->getShelfName();
    }
}
