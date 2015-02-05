<?php

namespace StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Zip
 *
 * @ORM\Table(name="zip")
 * @ORM\Entity
 */
class Zip
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
     * @ORM\Column(name="cityName", type="string", length=255, nullable=true)
     */
    private $cityName;

    /**
     * @var integer
     *
     * @ORM\Column(name="zipcode", type="integer", nullable=true)
     */
    private $zipcode;

    /**
     * @ORM\OneToMany(targetEntity="Customer", mappedBy="zipId")
     */
    private $customers_zip;

    public function __construct()
    {
        $this->customers_zip = new ArrayCollection();
    }

    public function __toString()
{
    return $this->cityName;
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
     * Set cityName
     *
     * @param string $cityName
     * @return Zip
     */
    public function setCityName($cityName)
    {
        $this->cityName = $cityName;

        return $this;
    }

    /**
     * Get cityName
     *
     * @return string 
     */
    public function getCityName()
    {
        return $this->cityName;
    }

    /**
     * Set zipcode
     *
     * @param integer $zipcode
     * @return Zip
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    /**
     * Get zipcode
     *
     * @return integer 
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * Add customers_zip
     *
     * @param \StoreBundle\Entity\Customer $customersZip
     * @return Zip
     */
    public function addCustomersZip(\StoreBundle\Entity\Customer $customersZip)
    {
        $this->customers_zip[] = $customersZip;

        return $this;
    }

    /**
     * Remove customers_zip
     *
     * @param \StoreBundle\Entity\Customer $customersZip
     */
    public function removeCustomersZip(\StoreBundle\Entity\Customer $customersZip)
    {
        $this->customers_zip->removeElement($customersZip);
    }

    /**
     * Get customers_zip
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCustomersZip()
    {
        return $this->customers_zip;
    }
}
