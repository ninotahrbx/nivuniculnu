<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * TypeBien
 *
 * @ORM\Table(name="type_bien")
 * @ORM\Entity
 */
class TypeBien
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_type", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idType;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle_type", type="string", length=50, nullable=false)
     */
    private $libelleType;


    /**
     * @var \Doctrine\Common\Collections\Collection
     * 
     * @ORM\OneToMany(targetEntity="Bien", mappedBy="idTypeBien")
     */
    private $idBien;

    public function __construct()
    {
        $this->idBien = new ArrayCollection();
    }

    public function getIdType(): ?int
    {
        return $this->idType;
    }

    public function getLibelleType(): ?string
    {
        return $this->libelleType;
    }

    public function setLibelleType(string $libelleType): self
    {
        $this->libelleType = $libelleType;

        return $this;
    }

    /**
     * @return Collection|Bien[]
     */
    public function getIdBien(): Collection
    {
        return $this->idBien;
    }

    public function addIdBien(Bien $idBien): self
    {
        if (!$this->idBien->contains($idBien)) {
            $this->idBien[] = $idBien;
            $idBien->setIdTypeBien($this);
        }

        return $this;
    }

    public function removeIdBien(Bien $idBien): self
    {
        if ($this->idBien->removeElement($idBien)) {
            // set the owning side to null (unless already changed)
            if ($idBien->getIdTypeBien() === $this) {
                $idBien->setIdTypeBien(null);
            }
        }

        return $this;
    }


}
