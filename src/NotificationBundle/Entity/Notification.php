<?php

namespace NotificationBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Notification
 *
 * @ORM\Table(name="notification")
 * @ORM\Entity(repositoryClass="NotificationBundle\Repository\NotificationRepository")
 */
class Notification
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     */    
    private $user;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;
    
    
       /**
     * @var boolean
     *
     * @ORM\Column(name="statut", type="boolean")
     */
    
    private $statut;
    
    
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Notification
     */
    public function setDate($date)
    {
        
        $this->date = new \Datetime();
  
    
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
     * Set description
     *
     * @param string $description
     *
     * @return Notification
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }
    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    
     /**
     * Set status
     *
     * @param boolean $status
     *
     * @return Notification
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;
    
        return $this;
    }
    /**
     * Get statut
     *
     * @return boolean
     */
    public function getStatut()
    {
        return $this->statut;
    }
    
    
}