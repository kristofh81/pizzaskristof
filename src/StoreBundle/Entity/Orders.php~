<?php

namespace StoreBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Orders
 *
 * @ORM\Table(name="orders")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks() 
 */
class Orders
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Customer", inversedBy="customers_zip")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     */
    private $customerId;

    /**
     * @var float
     *
     * @ORM\Column(name="reduction", type="float")
     */
    private $reduction;

    /**
     * @var float
     *
     * @ORM\Column(name="totalPrice", type="float")
     */
    private $totalPrice;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var boolean
     *
     * @ORM\Column(name="payed", type="boolean")
     */
    private $payed;

    /**
     * @var string
     *
     * @ORM\Column(name="infoOrder", type="string", length=255)
     */
    private $infoOrder;

    /**
     * @ORM\OneToMany(targetEntity="OrderedProduct", mappedBy="orderId")
     **/
    private $product_details;

    public function __construct()
    {
        $this->product_details = new ArrayCollection();
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
     * Set customerId
     *
     * @param integer $customerId
     * @return Orders
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;

        return $this;
    }

    /**
     * Get customerId
     *
     * @return integer 
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * Set reduction
     *
     * @param float $reduction
     * @return Orders
     */
    public function setReduction($reduction)
    {
        $this->reduction = $reduction;

        return $this;
    }

    /**
     * Get reduction
     *
     * @return float 
     */
    public function getReduction()
    {
        return $this->reduction;
    }

    /**
     * Set totalPrice
     *
     * @param float $totalPrice
     * @return Orders
     */
    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;

        return $this;
    }

    /**
     * Get totalPrice
     *
     * @return float 
     */
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Orders
     *
     * @ORM\PrePersist 
     */
    public function setDate($date)
    {
        $this->date = new \DateTime();

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set payed
     *
     * @param boolean $payed
     * @return Orders
     */
    public function setPayed($payed)
    {
        $this->payed = $payed;

        return $this;
    }

    /**
     * Get payed
     *
     * @return boolean 
     */
    public function getPayed()
    {
        return $this->payed;
    }

    /**
     * Set infoOrder
     *
     * @param string $infoOrder
     * @return Orders
     */
    public function setInfoOrder($infoOrder)
    {
        $this->infoOrder = $infoOrder;

        return $this;
    }

    /**
     * Get infoOrder
     *
     * @return string 
     */
    public function getInfoOrder()
    {
        return $this->infoOrder;
    }

    /**
     * Add product_details
     *
     * @param \StoreBundle\Entity\OrderedProduct $productDetails
     * @return Orders
     */
    public function addProductDetail(\StoreBundle\Entity\OrderedProduct $productDetails)
    {
        $this->product_details[] = $productDetails;

        return $this;
    }

    /**
     * Remove product_details
     *
     * @param \StoreBundle\Entity\OrderedProduct $productDetails
     */
    public function removeProductDetail(\StoreBundle\Entity\OrderedProduct $productDetails)
    {
        $this->product_details->removeElement($productDetails);
    }

    /**
     * Get product_details
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProductDetails()
    {
        return $this->product_details;
    }
}
