<?php

namespace App\Models;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity @Table(name="orders")
 **/

class Order
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;
    /** @Column(type="datetime") **/
    protected $date;

    /**
     * Many Orders have Many Products.
     * @ManyToMany(targetEntity="Product", inversedBy="orders")
     * @JoinTable(name="orders_products")
     */
    protected $products;

    /**
     * Many Customers have One Order.
     * @ManyToOne(targetEntity="Customer")
     * @JoinColumn(name="customer_id", referencedColumnName="id")
     */
    protected $customer;
    
    public function __construct() {
        $this->products = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getCustomer()
    {
        return $this->customer;
    }

    public function addCustomer(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function addProduct(Product $product)
    {
        $this->products[] = $product;
    }
}