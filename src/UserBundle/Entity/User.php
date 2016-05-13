<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="civilite", type="string", length=256, nullable=true)
     */
    private $civilite;

    /**
     * @ORM\Column(name="date", type="date")
     */
     private $naissance;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="text", nullable=true)
     */
    private $adresse;

	/**
     * @var string
     *
     * @ORM\Column(name="nom", type="text", nullable=true, length=256)
     */
    private $nom;
	
	/**
     * @var string
     *
     * @ORM\Column(name="prenom", type="text", nullable=true, length=256)
     */
    private $prenom;
	
    /**
     * @var integer
     *
     * @ORM\Column(name="postal", type="integer", nullable=true)
     */
    private $postal;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=256, nullable=true)
     */
    private $ville;

    /**
     * @var integer
     *
     * @ORM\Column(name="telephone", type="integer", nullable=true)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="projet", type="text", nullable=true)
     */
    private $projet;

    /**
     * @var string
     *
     * @ORM\Column(name="attentes", type="text", nullable=true)
     */
    private $attentes;

    /**
     * @var string
     *
     * @ORM\Column(name="situation_principale", type="string", length=256, nullable=true)
     */
    private $situation_principale;

    /**
     * @var string
     *
     * @ORM\Column(name="situation_secondaire", type="string", length=256, nullable=true)
     */
    private $situation_secondaire;

    /**
     * @var string
     *
     * @ORM\Column(name="fonction", type="string", length=256, nullable=true)
     */
    private $fonction;

    /**
     * @var string
     *
     * @ORM\Column(name="csp", type="string", length=256, nullable=true)
     */
    private $csp;

    /**
     * @var integer
     *
     * @ORM\Column(name="experience", type="integer", nullable=true)
     */
    private $experience;

    /**
     * @var string
     *
     * @ORM\Column(name="etudes", type="string", length=256, nullable=true)
     */
    private $etudes;

    /**
     * @var string
     *
     * @ORM\Column(name="de_nom", type="string", length=256, nullable=true)
     */
    private $de_nom;

    /**
     * @var integer
     *
     * @ORM\Column(name="de_postal", type="integer", nullable=true)
     */
    private $de_postal;

    /**
     * @var string
     *
     * @ORM\Column(name="de_ville", type="string", length=256, nullable=true)
     */
    private $de_ville;

    /**
     * @var integer
     *
     * @ORM\Column(name="de_taille", type="integer", nullable=true)
     */
    private $de_taille;
	
	
    /**
     * @var array
     *
     * @ORM\Column(name="en_poste", type="array", nullable=true)
     */
    private $en_poste;
	
	
	 /**
     * @var string
     *
     * @ORM\Column(name="en_recherche", type="string", nullable=true)
     */
    private $en_recherche;
	

    /**
    * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
    * @ORM\JoinColumn(nullable=true)
    */
    private $user;



    /**
     * Set civilite
     *
     * @param string $civilite
     *
     * @return User
     */
    public function setCivilite($civilite)
    {
        $this->civilite = $civilite;
    
        return $this;
    }

    /**
     * Get civilite
     *
     * @return string
     */
    public function getCivilite()
    {
        return $this->civilite;
    }

    /**
     * Set naissance
     *
     * @param \DateTime $naissance
     *
     * @return User
     */
    public function setNaissance($naissance)
    {
        $this->naissance = $naissance;
    
        return $this;
    }

    /**
     * Get naissance
     *
     * @return \DateTime
     */
    public function getNaissance()
    {
        return $this->naissance;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return User
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    
        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return User
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return User
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    
        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set postal
     *
     * @param integer $postal
     *
     * @return User
     */
    public function setPostal($postal)
    {
        $this->postal = $postal;
    
        return $this;
    }

    /**
     * Get postal
     *
     * @return integer
     */
    public function getPostal()
    {
        return $this->postal;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return User
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    
        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set telephone
     *
     * @param integer $telephone
     *
     * @return User
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    
        return $this;
    }

    /**
     * Get telephone
     *
     * @return integer
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set projet
     *
     * @param string $projet
     *
     * @return User
     */
    public function setProjet($projet)
    {
        $this->projet = $projet;
    
        return $this;
    }

    /**
     * Get projet
     *
     * @return string
     */
    public function getProjet()
    {
        return $this->projet;
    }

    /**
     * Set attentes
     *
     * @param string $attentes
     *
     * @return User
     */
    public function setAttentes($attentes)
    {
        $this->attentes = $attentes;
    
        return $this;
    }

    /**
     * Get attentes
     *
     * @return string
     */
    public function getAttentes()
    {
        return $this->attentes;
    }

    /**
     * Set situationPrincipale
     *
     * @param string $situationPrincipale
     *
     * @return User
     */
    public function setSituationPrincipale($situationPrincipale)
    {
        $this->situation_principale = $situationPrincipale;
    
        return $this;
    }

    /**
     * Get situationPrincipale
     *
     * @return string
     */
    public function getSituationPrincipale()
    {
        return $this->situation_principale;
    }

    /**
     * Set situationSecondaire
     *
     * @param string $situationSecondaire
     *
     * @return User
     */
    public function setSituationSecondaire($situationSecondaire)
    {
        $this->situation_secondaire = $situationSecondaire;
    
        return $this;
    }

    /**
     * Get situationSecondaire
     *
     * @return string
     */
    public function getSituationSecondaire()
    {
        return $this->situation_secondaire;
    }

    /**
     * Set fonction
     *
     * @param string $fonction
     *
     * @return User
     */
    public function setFonction($fonction)
    {
        $this->fonction = $fonction;
    
        return $this;
    }

    /**
     * Get fonction
     *
     * @return string
     */
    public function getFonction()
    {
        return $this->fonction;
    }

    /**
     * Set csp
     *
     * @param string $csp
     *
     * @return User
     */
    public function setCsp($csp)
    {
        $this->csp = $csp;
    
        return $this;
    }

    /**
     * Get csp
     *
     * @return string
     */
    public function getCsp()
    {
        return $this->csp;
    }

    /**
     * Set experience
     *
     * @param integer $experience
     *
     * @return User
     */
    public function setExperience($experience)
    {
        $this->experience = $experience;
    
        return $this;
    }

    /**
     * Get experience
     *
     * @return integer
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * Set etudes
     *
     * @param string $etudes
     *
     * @return User
     */
    public function setEtudes($etudes)
    {
        $this->etudes = $etudes;
    
        return $this;
    }

    /**
     * Get etudes
     *
     * @return string
     */
    public function getEtudes()
    {
        return $this->etudes;
    }

    /**
     * Set deNom
     *
     * @param string $deNom
     *
     * @return User
     */
    public function setDeNom($deNom)
    {
        $this->de_nom = $deNom;
    
        return $this;
    }

    /**
     * Get deNom
     *
     * @return string
     */
    public function getDeNom()
    {
        return $this->de_nom;
    }

    /**
     * Set dePostal
     *
     * @param integer $dePostal
     *
     * @return User
     */
    public function setDePostal($dePostal)
    {
        $this->de_postal = $dePostal;
    
        return $this;
    }

    /**
     * Get dePostal
     *
     * @return integer
     */
    public function getDePostal()
    {
        return $this->de_postal;
    }

    /**
     * Set deVille
     *
     * @param string $deVille
     *
     * @return User
     */
    public function setDeVille($deVille)
    {
        $this->de_ville = $deVille;
    
        return $this;
    }

    /**
     * Get deVille
     *
     * @return string
     */
    public function getDeVille()
    {
        return $this->de_ville;
    }

    /**
     * Set deTaille
     *
     * @param integer $deTaille
     *
     * @return User
     */
    public function setDeTaille($deTaille)
    {
        $this->de_taille = $deTaille;
    
        return $this;
    }

    /**
     * Get deTaille
     *
     * @return integer
     */
    public function getDeTaille()
    {
        return $this->de_taille;
    }

    /**
     * Set enPoste
     *
     * @param array $enPoste
     *
     * @return User
     */
    public function setEnPoste($enPoste)
    {
        $this->en_poste = $enPoste;
    
        return $this;
    }

    /**
     * Get enPoste
     *
     * @return array
     */
    public function getEnPoste()
    {
        return $this->en_poste;
    }

    /**
     * Set enRecherche
     *
     * @param string $enRecherche
     *
     * @return User
     */
    public function setEnRecherche($enRecherche)
    {
        $this->en_recherche = $enRecherche;
    
        return $this;
    }

    /**
     * Get enRecherche
     *
     * @return string
     */
    public function getEnRecherche()
    {
        return $this->en_recherche;
    }



    /**
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     *
     * @return User
     */
    public function setUser(\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
