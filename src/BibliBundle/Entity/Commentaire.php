<?php

namespace BibliBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaire
 *
 * @ORM\Table(name="commentaire")
 * @ORM\Entity(repositoryClass="BibliBundle\Repository\CommentaireRepository")
 */
class Commentaire
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
     * @var string
     *
     * @ORM\Column(name="corps", type="text")
     */
    private $corps;

    /**
    * @ORM\ManyToOne(targetEntity="BibliBundle\Entity\Commentaire")
    * @ORM\JoinColumn(nullable=true)
    */
    private $commentairePere;

    /**
    * @ORM\ManyToOne(targetEntity="BibliBundle\Entity\Document")
    * @ORM\JoinColumn(nullable=false)
    */
    private $document;

    /**
    * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
    * @ORM\JoinColumn(nullable=false)
    */
    private $conseiller;

    /**
    * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
    * @ORM\JoinColumn(nullable=false)
    */
    private $candidat;

    private $enfants;

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
     * Set corps
     *
     * @param string $corps
     *
     * @return Commentaire
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

    /**
     * Set commentairePere
     *
     * @param \BibliBundle\Entity\Commentaire $commentairePere
     *
     * @return Commentaire
     */
    public function setCommentairePere(\BibliBundle\Entity\Commentaire $commentairePere = null)
    {
        $this->commentairePere = $commentairePere;
    
        return $this;
    }

    /**
     * Get commentairePere
     *
     * @return \BibliBundle\Entity\Commentaire
     */
    public function getCommentairePere()
    {
        return $this->commentairePere;
    }

    /**
     * Set document
     *
     * @param \BibliBundle\Entity\Document $document
     *
     * @return Commentaire
     */
    public function setDocument(\BibliBundle\Entity\Document $document)
    {
        $this->document = $document;
    
        return $this;
    }

    /**
     * Get document
     *
     * @return \BibliBundle\Entity\Document
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * Set conseiller
     *
     * @param \UserBundle\Entity\User $conseiller
     *
     * @return Commentaire
     */
    public function setConseiller(\UserBundle\Entity\User $conseiller)
    {
        $this->conseiller = $conseiller;
    
        return $this;
    }

    /**
     * Get conseiller
     *
     * @return \UserBundle\Entity\User
     */
    public function getConseiller()
    {
        return $this->conseiller;
    }

    /**
     * Set candidat
     *
     * @param \UserBundle\Entity\User $candidat
     *
     * @return Commentaire
     */
    public function setCandidat(\UserBundle\Entity\User $candidat)
    {
        $this->candidat = $candidat;
    
        return $this;
    }

    /**
     * Get candidat
     *
     * @return \UserBundle\Entity\User
     */
    public function getCandidat()
    {
        return $this->candidat;
    }

    public function setEnfants($enfants)
    {
        $this->enfants = $enfants;
    
        return $this;
    }

    public function getEnfants()
    {
        return $this->enfants;
    }
}
