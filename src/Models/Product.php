<?php

namespace App\Models;

/**
 * @Entity @Table(name="products")
 **/

class Product
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;
    /** @Column(type="string") **/
    protected $name;

    /**
     * Many Products have Many Orders.
     * @ManyToMany(targetEntity="Order", mappedBy="products")
     */
    private $orders;    

    public function __construct() {
        $this->orders = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}