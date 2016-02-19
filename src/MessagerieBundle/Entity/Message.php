<?php

namespace MessagerieBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table(name="message")
 * @ORM\Entity(repositoryClass="MessagerieBundle\Repository\MessageRepository")
 */
class Message
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
     * @var int
     *
     * @ORM\Column(name="id_destinataire", type="integer")
     */
    private $idDestinataire;

    /**
     * @var int
     *
     * @ORM\Column(name="id_auteur", type="integer")
     */
    private $idAuteur;

    /**
     * @var string
     *
     * @ORM\Column(name="sujet", type="string", length=256, nullable=true)
     */
    private $sujet;

    /**
     * @var string
     *
     * @ORM\Column(name="corps", type="string", length=256)
     */
    private $corps;


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
     * Set idDestinataire
     *
     * @param integer $idDestinataire
     *
     * @return Message
     */
    public function setIdDestinataire($idDestinataire)
    {
        $this->idDestinataire = $idDestinataire;
    
        return $this;
    }

    /**
     * Get idDestinataire
     *
     * @return integer
     */
    public function getIdDestinataire()
    {
        return $this->idDestinataire;
    }

    /**
     * Set idAuteur
     *
     * @param integer $idAuteur
     *
     * @return Message
     */
    public function setIdAuteur($idAuteur)
    {
        $this->idAuteur = $idAuteur;
    
        return $this;
    }

    /**
     * Get idAuteur
     *
     * @return integer
     */
    public function getIdAuteur()
    {
        return $this->idAuteur;
    }

    /**
     * Set sujet
     *
     * @param string $sujet
     *
     * @return Message
     */
    public function setSujet($sujet)
    {
        $this->sujet = $sujet;
    
        return $this;
    }

    /**
     * Get sujet
     *
     * @return string
     */
    public function getSujet()
    {
        return $this->sujet;
    }

    /**
     * Set corps
     *
     * @param string $corps
     *
     * @return Message
     */
    public function setCorps($corps)
    {
        $this->corps = $corps;
    
        return $this;
    }

    /**
     * Get corps
     *
     * @return string
     */
    public function getCorps()
    {
        return $this->corps;
    }
}

