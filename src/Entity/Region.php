<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Region
 *
 * @ORM\Table(name="region", indexes={@ORM\Index(name="region_departement_FK", columns={"id_departement"})})
 * @ORM\Entity
 */
class Region
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_region", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRegion;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle_region", type="string", length=50, nullable=false)
     */
    private $libelleRegion;

    /**
     * @var \Departement
     *
     * @ORM\ManyToOne(targetEntity="Departement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_departement", referencedColumnName="id_departement")
     * })
     */
    private $idDepartement;

    public function getIdRegion(): ?int
    {
        return $this->idRegion;
    }

    public function getLibelleRegion(): ?string
    {
        return $this->libelleRegion;
    }

    public function setLibelleRegion(string $libelleRegion): self
    {
        $this->libelleRegion = $libelleRegion;

        return $this;
    }

    public function getIdDepartement(): ?Departement
    {
        return $this->idDepartement;
    }

    public function setIdDepartement(?Departement $idDepartement): self
    {
        $this->idDepartement = $idDepartement;

        return $this;
    }


}
