<?php

namespace StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ordered_product
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Ordered_product
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
     * @ORM\Column(name="extra_price", type="float")
     */
    private $extraPrice;

   /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="ordered_product")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    private $productId;


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
     * @return Ordered_product
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
     * @return Ordered_product
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
     * @return Ordered_product
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
}