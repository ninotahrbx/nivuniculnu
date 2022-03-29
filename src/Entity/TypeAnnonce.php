<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * TypeAnnonce
 *
 * @ORM\Table(name="type_annonce")
 * @ORM\Entity
 */
class TypeAnnonce
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_type_annonce", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTypeAnnonce;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle_type_annonce", type="string", length=1, nullable=false)
     */
    private $libelleTypeAnnonce;


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


    public function getIdTypeAnnonce(): ?int
    {
        return $this->idTypeAnnonce;
    }

    public function getLibelleTypeAnnonce(): ?string
    {
        return $this->libelleTypeAnnonce;
    }

    public function setLibelleTypeAnnonce(string $libelleTypeAnnonce): self
    {
        $this->libelleTypeAnnonce = $libelleTypeAnnonce;

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
