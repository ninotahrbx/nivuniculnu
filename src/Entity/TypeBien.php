<?php

namespace App\Entity;

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


}
