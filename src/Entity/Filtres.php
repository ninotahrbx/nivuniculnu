<?php

namespace App\Entity;

use App\Entity\TypeBien;
use App\Entity\TypeAnnonce;
use Doctrine\ORM\Mapping as ORM;


class Filtres
{
  /**
   * @var int|null
   */
    private $minSurface;

    /**
   * @var int|null
   */
    private $prixMax;


    /**
   * @var int
   */
   public $page = 1;

   /**
     * @var Filtre[]
     */
    public $categories = [];

/**
     * @var \TypeAnnonce
     *
     * @ORM\ManyToOne(targetEntity="TypeAnnonce", inversedBy="idBien")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_type_annonce", referencedColumnName="id_type_annonce")
     * })
     */
    private $idTypeAnnonce;

    /**
     * @var \TypeBien
     *
     * @ORM\ManyToOne(targetEntity="TypeBien", inversedBy="idBien")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_type", referencedColumnName="id_type")
     * })
     */
    private $idType;

    /**
     * Get the value of minSurface
     *
     * @return  int|null
     */ 
    public function getMinSurface()
    {
        return $this->minSurface;
    }

    /**
     * Set the value of minSurface
     *
     * @param  int|null  $minSurface
     *
     * @return  self
     */ 
    public function setMinSurface($minSurface)
    {
        $this->minSurface = $minSurface;

        return $this;
    }


    /**
     * @var int
     *
     * @ORM\Column(name="nombre_piece", type="integer", length=50, nullable=false)
     */
    private $nombrePiece;


    /**
     * Get the value of prixMax
     *
     * @return  int|null
     */ 
    public function getPrixMax()
    {
        return $this->prixMax;
    }

    /**
     * Set the value of prixMax
     *
     * @param  int|null  $prixMax
     *
     * @return  self
     */ 
    public function setPrixMax($prixMax)
    {
        $this->prixMax = $prixMax;

        return $this;
    }

    /**
     * Get the value of idTypeAnnonce
     *
     * @return  \TypeAnnonce
     */ 
    public function getIdTypeAnnonce()
    {
        return $this->idTypeAnnonce;
    }

    /**
     * Set the value of idTypeAnnonce
     *
     * @param  \TypeAnnonce  $idTypeAnnonce
     *
     * @return  self
     */ 
    public function setIdTypeAnnonce(\TypeAnnonce $idTypeAnnonce)
    {
        $this->idTypeAnnonce = $idTypeAnnonce;

        return $this;
    }

    /**
     * Get the value of idType
     *
     * @return  \TypeBien
     */ 
    public function getIdType()
    {
        return $this->idType;
    }

    /**
     * Set the value of idType
     *
     * @param  \TypeBien  $idType
     *
     * @return  self
     */ 
    public function setIdType(\TypeBien $idType)
    {
        $this->idType = $idType;

        return $this;
    }

    /**
     * Get the value of nombrePiece
     *
     * @return  int
     */ 
    public function getNombrePiece()
    {
        return $this->nombrePiece;
    }

    /**
     * Set the value of nombrePiece
     *
     * @param  int  $nombrePiece
     *
     * @return  self
     */ 
    public function setNombrePiece(int $nombrePiece)
    {
        $this->nombrePiece = $nombrePiece;

        return $this;
    }
}
