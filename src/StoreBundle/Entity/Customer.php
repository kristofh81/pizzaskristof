<?php

namespace StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Customer
 *
 * @ORM\Table(name="customer")
 * @ORM\Entity
 */
class Customer
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
     * @ORM\Column(name="firstname", type="string", length=255)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var integer
     *
     * @ORM\Column(name="houseNr", type="integer")
     */
    private $houseNr;

    /**
     * @var string
     *
     * @ORM\Column(name="houseNrAdd", type="string", length=255)
     */
    private $houseNrAdd;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Zip", inversedBy="customers_zip")
     * @ORM\JoinColumn(name="zip_id", referencedColumnName="id")
     */
    private $zipId;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=20)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100)
     */
    private $email;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="customers_users")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $userId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;


    /**
     * @ORM\OneToMany(targetEntity="Orders", mappedBy="customerId")
     **/
    private $orders;

    public function __construct()
    {
        $this->orders = new ArrayCollection();
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
     * Set firstname
     *
     * @param string $firstname
     * @return Customer
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return Customer
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Customer
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set houseNr
     *
     * @param integer $houseNr
     * @return Customer
     */
    public function setHouseNr($houseNr)
    {
        $this->houseNr = $houseNr;

        return $this;
    }

    /**
     * Get houseNr
     *
     * @return integer 
     */
    public function getHouseNr()
    {
        return $this->houseNr;
    }

    /**
     * Set houseNrAdd
     *
     * @param string houseNrAdd
     * @return Customer
     */
    public function setHouseNrAdd($houseNrAdd)
    {
        $this->houseNrAdd = $houseNrAdd;

        return $this;
    }

    /**
     * Get houseNrAdd
     *
     * @return string 
     */
    public function getHouseNrAdd()
    {
        return $this->houseNrAdd;
    }

    /**
     * Set zipId
     *
     * @param integer $zipId
     * @return Customer
     */
    public function setZipId($zipId)
    {
        $this->zipId = $zipId;

        return $this;
    }

    /**
     * Get zipId
     *
     * @return integer 
     */
    public function getZipId()
    {
        return $this->zipId;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Customer
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Customer
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     * @return Customer
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return Customer
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }
}
