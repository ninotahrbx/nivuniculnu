<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vue
 *
 * @ORM\Table(name="vue")
 * @ORM\Entity
 */
class Vue
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_click", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idClick;

    /**
     * @var int
     *
     * @ORM\Column(name="nombre_click", type="integer", nullable=false)
     */
    private $nombreClick;

    public function getIdClick(): ?int
    {
        return $this->idClick;
    }

    public function getNombreClick(): ?int
    {
        return $this->nombreClick;
    }

    public function setNombreClick(int $nombreClick): self
    {
        $this->nombreClick = $nombreClick;

        return $this;
    }


}
