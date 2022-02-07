<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Departement
 *
 * @ORM\Table(name="departement", indexes={@ORM\Index(name="departement_ville_FK", columns={"id_ville"})})
 * @ORM\Entity
 */
class Departement
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_departement", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDepartement;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle_departement", type="string", length=50, nullable=false)
     */
    private $libelleDepartement;

    /**
     * @var \Ville
     *
     * @ORM\ManyToOne(targetEntity="Ville")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_ville", referencedColumnName="id_ville")
     * })
     */
    private $idVille;

    public function getIdDepartement(): ?int
    {
        return $this->idDepartement;
    }

    public function getLibelleDepartement(): ?string
    {
        return $this->libelleDepartement;
    }

    public function setLibelleDepartement(string $libelleDepartement): self
    {
        $this->libelleDepartement = $libelleDepartement;

        return $this;
    }

    public function getIdVille(): ?Ville
    {
        return $this->idVille;
    }

    public function setIdVille(?Ville $idVille): self
    {
        $this->idVille = $idVille;

        return $this;
    }


}
