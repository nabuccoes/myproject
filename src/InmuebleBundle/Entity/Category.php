<?php

namespace InmuebleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity
 */
class Category
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=85, nullable=false)
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Inmueble", mappedBy="category")
     */
    private $recipe;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->inmueble = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Category
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
     * Add recipe
     *
     * @param \InmuebleBundle\Entity\Inmueble $recipe
     * @return Category
     */
    public function addInmueble(\InmuebleBundle\Entity\Inmueble $inmueble)
    {
        $this->inmueble[] = $inmueble;

        return $this;
    }

    /**
     * Remove recipe
     *
     * @param \InmuebleBundle\Entity\Inmueble $recipe
     */
    public function removeInmueble(\InmuebleBundle\Entity\Inmueble $inmueble)
    {
        $this->recipe->removeElement($recipe);
    }

    /**
     * Get recipe
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getInmueble()
    {
        return $this->inmueble;
    }
}
