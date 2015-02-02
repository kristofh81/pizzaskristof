<?php

namespace StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrderedProduct
 *
 * @ORM\Table(name="ordered_product")
 * @ORM\Entity
 */
class OrderedProduct
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
     * @var string
     *
     * @ORM\Column(name="extra", type="string", length=255)
     */
    private $extra;

    /**
     * @var float
     *
     * @ORM\Column(name="extraPrice", type="float")
     */
    private $extraPrice;

   /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="ordered_products")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    private $productId;

   /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Orders", inversedBy="product_details")
     * @ORM\JoinColumn(name="order_id", referencedColumnName="id")
     */
    private $orderId;

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
     * Set extra
     *
     * @param string $extra
     * @return OrderedProduct
     */
    public function setExtra($extra)
    {
        $this->extra = $extra;

        return $this;
    }

    /**
     * Get extra
     *
     * @return string 
     */
    public function getExtra()
    {
        return $this->extra;
    }

    /**
     * Set extraPrice
     *
     * @param float $extraPrice
     * @return OrderedProduct
     */
    public function setExtraPrice($extraPrice)
    {
        $this->extraPrice = $extraPrice;

        return $this;
    }

    /**
     * Get extraPrice
     *
     * @return float 
     */
    public function getExtraPrice()
    {
        return $this->extraPrice;
    }

    /**
     * Set productId
     *
     * @param \StoreBundle\Entity\Product $productId
     * @return OrderedProduct
     */
    public function setProductId(\StoreBundle\Entity\Product $productId = null)
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * Get productId
     *
     * @return \StoreBundle\Entity\Product 
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Set orderId
     *
     * @param \StoreBundle\Entity\Orders $orderId
     * @return OrderedProduct
     */
    public function setOrderId(\StoreBundle\Entity\Orders $orderId = null)
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * Get orderId
     *
     * @return \StoreBundle\Entity\Orders 
     */
    public function getOrderId()
    {
        return $this->orderId;
    }
}
