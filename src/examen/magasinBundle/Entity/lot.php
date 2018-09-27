<?php

namespace examen\magasinBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * lot
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="examen\magasinBundle\Entity\lotRepository")
 */
class lot
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
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateajout", type="date")
     */
    private $dateajout;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantite", type="integer")
     */
    private $quantite;

    /**
     * @var float
     *
     * @ORM\Column(name="prixlot", type="float")
     */
    private $prixlot;
    
      /**
     * @var integer
     *
     * @ORM\Column(name="promotion", type="integer" ,options={"default"=0})
     */
    private $promotion;


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
     * Set libelle
     *
     * @param string $libelle
     * @return lot
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set dateajout
     *
     * @param \DateTime $dateajout
     * @return lot
     */
    public function setDateajout($dateajout)
    {
        $this->dateajout = $dateajout;

        return $this;
    }

    /**
     * Get dateajout
     *
     * @return \DateTime 
     */
    public function getDateajout()
    {
        return $this->dateajout;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     * @return lot
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer 
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

     /**
     * Set promotion
     *
     * @param integer $promotion
     * @return lot
     */
    public function setPromotion($promotion)
    {
        $this->quantite = $quantite;

        return $this;
    }
    
      /**
     * Get promotion
     *
     * @return integer 
     */
    public function getPromotion()
    {
        return $this->promotion;
    }
    /**
     * Set prixlot
     *
     * @param float $prixlot
     * @return lot
     */
    public function setPrixlot($prixlot)
    {
        $this->prixlot = $prixlot;

        return $this;
    }

    /**
     * Get prixlot
     *
     * @return float 
     */
    public function getPrixlot()
    {
        return $this->prixlot;
    }
}
