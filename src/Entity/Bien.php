<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bien
 *
 * @ORM\Table(name="bien", indexes={@ORM\Index(name="bien_type_annonce1_FK", columns={"id_type_annonce"}), @ORM\Index(name="bien_vue2_FK", columns={"id_click"}), @ORM\Index(name="bien_type_bien_FK", columns={"id_type"}), @ORM\Index(name="bien_region3_FK", columns={"id_region"}), @ORM\Index(name="bien_compte_utilisateur0_FK", columns={"id_utilisateur"})})
 * @ORM\Entity
 */
class Bien
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_bien", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idBien;

    /**
     * @var string
     *
     * @ORM\Column(name="surface", type="string", length=50, nullable=false)
     */
    private $surface;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_piece", type="string", length=50, nullable=false)
     */
    private $nombrePiece;

    /**
     * @var string
     *
     * @ORM\Column(name="img", type="string", length=250, nullable=false)
     * 
     */
    private $img;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=50, nullable=false)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="secteur", type="string", length=50, nullable=false)
     */
    private $secteur;

    /**
     * @var string
     *
     * @ORM\Column(name="exposition", type="string", length=50, nullable=false)
     */
    private $exposition;

    /**
     * @var bool
     *
     * @ORM\Column(name="exterieur", type="boolean", nullable=false)
     */
    private $exterieur;

    /**
     * @var string
     *
     * @ORM\Column(name="energie", type="string", length=50, nullable=false)
     */
    private $energie;

    /**
     * @var int
     *
     * @ORM\Column(name="prix", type="integer", nullable=false)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="string", length=250, nullable=false)
     */
    private $commentaire;

    /**
     * @var \TypeBien
     *
     * @ORM\ManyToOne(targetEntity="TypeBien")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_type", referencedColumnName="id_type")
     * })
     */
    private $idType;

    /**
     * @var \CompteUtilisateur
     *
     * @ORM\ManyToOne(targetEntity="CompteUtilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_utilisateur", referencedColumnName="id_utilisateur")
     * })
     */
    private $idUtilisateur;

    /**
     * @var \TypeAnnonce
     *
     * @ORM\ManyToOne(targetEntity="TypeAnnonce")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_type_annonce", referencedColumnName="id_type_annonce")
     * })
     */
    private $idTypeAnnonce;

    /**
     * @var \Vue
     *
     * @ORM\ManyToOne(targetEntity="Vue")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_click", referencedColumnName="id_click")
     * })
     */
    private $idClick;

    /**
     * @var \Region
     *
     * @ORM\ManyToOne(targetEntity="Region")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_region", referencedColumnName="id_region")
     * })
     */
    private $idRegion;

    public function getIdBien(): ?int
    {
        return $this->idBien;
    }

    public function getSurface(): ?string
    {
        return $this->surface;
    }

    public function setSurface(string $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getNombrePiece(): ?string
    {
        return $this->nombrePiece;
    }

    public function setNombrePiece(string $nombrePiece): self
    {
        $this->nombrePiece = $nombrePiece;

        return $this;
    }

    public function getImg()
    {
        return $this->img;
    }

    public function setImg(string $img): self
    {
        $this->img = $img;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getSecteur(): ?string
    {
        return $this->secteur;
    }

    public function setSecteur(string $secteur): self
    {
        $this->secteur = $secteur;

        return $this;
    }

    public function getExposition(): ?string
    {
        return $this->exposition;
    }

    public function setExposition(string $exposition): self
    {
        $this->exposition = $exposition;

        return $this;
    }

    public function getExterieur(): ?bool
    {
        return $this->exterieur;
    }

    public function setExterieur(bool $exterieur): self
    {
        $this->exterieur = $exterieur;

        return $this;
    }

    public function getEnergie(): ?string
    {
        return $this->energie;
    }

    public function setEnergie(string $energie): self
    {
        $this->energie = $energie;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getIdType(): ?TypeBien
    {
        return $this->idType;
    }

    public function setIdType(?TypeBien $idType): self
    {
        $this->idType = $idType;

        return $this;
    }

    public function getIdUtilisateur(): ?CompteUtilisateur
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur(?CompteUtilisateur $idUtilisateur): self
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }

    public function getIdTypeAnnonce(): ?TypeAnnonce
    {
        return $this->idTypeAnnonce;
    }

    public function setIdTypeAnnonce(?TypeAnnonce $idTypeAnnonce): self
    {
        $this->idTypeAnnonce = $idTypeAnnonce;

        return $this;
    }

    public function getIdClick(): ?Vue
    {
        return $this->idClick;
    }

    public function setIdClick(?Vue $idClick): self
    {
        $this->idClick = $idClick;

        return $this;
    }

    public function getIdRegion(): ?Region
    {
        return $this->idRegion;
    }

    public function setIdRegion(?Region $idRegion): self
    {
        $this->idRegion = $idRegion;

        return $this;
    }


}
