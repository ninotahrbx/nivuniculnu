<?php

namespace App\Entity;


use App\Entity\Img;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\CompteUtilisateur;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints\Date;

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
     * @var int
     *
     * @ORM\Column(name="surface", type="integer", length=50, nullable=false)
     */
    private $surface;

    /**
     * @var int
     *
     * @ORM\Column(name="nombre_piece", type="integer", length=50, nullable=false)
     */
    private $nombrePiece;

 



    /**
     * @var string
     * 
     * 
     * @ORM\OneToMany(targetEntity="App\Entity\Img", mappedBy="bien" )
     * @ORM\Column(name="img", type="string", length=255, nullable=false)
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
     * @ORM\Column(name="code_postal", type="string", length=10, nullable=false)
     */
    private $codePostal;

 /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=50, nullable=false)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="exposition", type="string", length=50, nullable=false)
     */
    private $exposition;

    /**
     * @var string
     *
     * @ORM\Column(name="exterieur", type="string", nullable=false)
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
    private $description;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateParution", type="date", nullable=false)
     */
    private $dateParution;



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
     * @ORM\ManyToOne(targetEntity="TypeAnnonce", inversedBy="idBien")
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
     * @ORM\Column(type="boolean")
     */
    private $active;




    public function __construct()
    {
        $this->lien = new ArrayCollection();
    }

    public function getIdBien(): ?int
    {
        return $this->idBien;
    }

    public function setIdBien(int $idBien): ?int
    {
        $this->idBien = $idBien;
    }

    public function getSurface(): ?int
    {
        return $this->surface;
    }

    public function setSurface(int $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getNombrePiece(): ?int
    {
        return $this->nombrePiece;
    }

    public function setNombrePiece(int $nombrePiece): self
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

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(string $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

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

    public function getExterieur(): ?string
    {
        return $this->exterieur;
    }

    public function setExterieur(string $exterieur): self
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDateParution(): ?\DateTimeInterface
    {
        return $this->dateParution;
    }

    public function setDateParution(\DateTimeInterface $dateParution): self
    {
        $this->dateParution = $dateParution;

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

    


  /**
   * @return Collection|CompteUtilisateur[]
   */

/*    public function getIdUtilisateur(): ?CompteUtilisateur
   {  
    return $this->idUtilisateur;
   }

   public function setIdUtilisateur(?CompteUtilisateur $idUtilisateur): self
   {
    $this->idUtilisateur = $idUtilisateur;

    return $this;
   } 

 */



    /**
     * Get the value of active
     */ 
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set the value of active
     *
     * @return  self
     */ 
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }
}
