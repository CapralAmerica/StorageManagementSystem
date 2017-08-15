<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Shelving
 *
 * @ORM\Table(name="shelving")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ShelvingRepository")
 */
class Shelving
{

    /**
     * @ORM\OneToMany(targetEntity="Shelf", mappedBy="Shelviing")
     */
    private $shelfs;

    public function __construct()
    {
        $this->shelfs = new ArrayCollection();
    }

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\Type("string")
     * @Assert\Length(max=3)
     *
     */

     private $name;


    /**
     * @var int
     *
     * @ORM\Column(name="shelfs_quantity", type="integer")
     */
    private $shelfsQuantity;


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
     * Set number
     *
     * @param string $number
     *
     * @return Shelving
     */
    public function setNumber($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get number
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->name;
    }


    /**
     * Set shelfsQuantity
     *
     * @param integer $shelfsQuantity
     *
     * @return Shelving
     */
    public function setShelfsQuantity($shelfsQuantity)
    {
        $this->shelfsQuantity = $shelfsQuantity;

        return $this;
    }

    /**
     * Get shelfsQuantity
     *
     * @return integer
     */
    public function getShelfsQuantity()
    {
        return $this->shelfsQuantity;
    }

    /**
     * Add shelf
     *
     * @param \AppBundle\Entity\Shelf $shelf
     *
     * @return Shelving
     */
    public function addShelf(\AppBundle\Entity\Shelf $shelf)
    {
        $this->shelfs[] = $shelf;

        return $this;
    }

    /**
     * Remove shelf
     *
     * @param \AppBundle\Entity\Shelf $shelf
     */
    public function removeShelf(\AppBundle\Entity\Shelf $shelf)
    {
        $this->shelfs->removeElement($shelf);
    }

    /**
     * Get shelfs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getShelfs()
    {
        return $this->shelfs;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Shelving
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
}
