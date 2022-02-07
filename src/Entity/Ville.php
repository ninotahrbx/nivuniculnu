<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ville
 *
 * @ORM\Table(name="ville")
 * @ORM\Entity
 */
class Ville
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_ville", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idVille;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle_ville", type="string", length=50, nullable=false)
     */
    private $libelleVille;

    public function getIdVille(): ?int
    {
        return $this->idVille;
    }

    public function getLibelleVille(): ?string
    {
        return $this->libelleVille;
    }

    public function setLibelleVille(string $libelleVille): self
    {
        $this->libelleVille = $libelleVille;

        return $this;
    }


}
