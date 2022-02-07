<?php

namespace App\Entity;

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


}
