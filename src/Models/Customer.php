<?php

namespace App\Models;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity @Table(name="customers")
 **/

class Customer
{

    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;
    /** @Column(type="string", length=100) **/
    protected $name;

    /**
     * One Customer has Many Orders.
     * @OneToMany(targetEntity="Order", mappedBy="Customer")
     */
    private $order;

    public function __construct() {
        $this->order = new ArrayCollection();
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