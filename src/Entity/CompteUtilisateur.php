<?php

namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherAwareInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

/**
 * CompteUtilisateur
 *
 * @ORM\Table(name="compte_utilisateur")
 * @ORM\Entity(repositoryClass= "App\Repository\UtilisateurRepository")
 */
class CompteUtilisateur implements UserInterface, PasswordAuthenticatedUserInterface, PasswordHasherAwareInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_utilisateur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUtilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="civilite", type="string", length=50, nullable=false)
     */
    private $civilite;

    /**
     * @var string
     *
     * @ORM\Column(name="pseudo", type="string", length=50, nullable=false)
     */
    private $pseudo;

    /**
     * @var string
     *
     * @ORM\Column(name="mdp", type="string", length=250, nullable=false)
     */
    private $mdp;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="tel_utilisateur", type="string", length=50, nullable=false)
     */
    private $telUtilisateur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_inscription", type="date", nullable=true)
     */
    private $dateInscription;
/**
     * @var string
     *
     * @ORM\Column(name="ip_inscription", type="string", length=250, nullable=false)
     */
    private $ipInscription;

    /**
     * @var string
     *
     * @ORM\Column(name="tracker", type="string", length=50, nullable=false)
     */
    private $tracker;

    /**
     * @var string
     *
     * @ORM\Column(name="role_utilisateur", type="string", length=50, nullable=false)
     */


    private $roleUtilisateur;

   
   

    public function getIdUtilisateur(): ?int
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur(string $idUtilisateur): self
    {
        $this->idUtilisateur = $idUtilisateur;
    } 

    public function getCivilite(): ?string
    {
        return $this->civilite;
    }

    public function setCivilite(string $civilite): self
    {
        $this->civilite = $civilite;

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelUtilisateur(): ?string
    {
        return $this->telUtilisateur;
    }

    public function setTelUtilisateur(string $telUtilisateur): self
    {
        $this->telUtilisateur = $telUtilisateur;

        return $this;
    }

    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->dateInscription;
    }

    public function setDateInscription(\DateTimeInterface $dateInscription): self
    {
        $this->dateInscription = $dateInscription;

        return $this;
    }
    
    public function getIpInscription(): ?string
    {
        return $this->ipInscription;
    }

    public function setIpInscription(string $ipInscription): self
    {
        $this->ipInscription = $ipInscription;

        return $this;
    }

    public function getTracker(): ?string
    {
        return $this->tracker;
    }

    public function setTracker(string $tracker): self
    {
        $this->tracker = $tracker;

        return $this;
    }

    public function getRoleUtilisateur(): ?string
    {
        return $this->roleUtilisateur;
    }

    public function setRoleUtilisateur(string $roleUtilisateur): self
    {
        $this->roleUtilisateur = $roleUtilisateur;

        return $this;
    }
    
   /**

     * 

     *

     * @see UserInterface

     */
    public function getSalt(): ?string{
        return null;
    }
 /**

     *

     *

     * @see UserInterface

     */
    public function eraseCredentials(){
       
    }


    public function getPasswordHasherName(): ?string{
               
        return null;
    }

    

  /**

     * The public representation of the user (e.g. a username, an email address, etc.)

     *

     * @see UserInterface

     */

    public function getUserIdentifier(): string

    {

        return (string) $this->email;

    }


    /**

     * @see UserInterface

     */

    public function getRoles(): array

    {

        // $roles = $this->roleUtilisateur;

        // guarantee every user at least has ROLE_USER

        $roles[] = 'ROLE_USER';


        return array_unique($roles);

    }



    /**

     * @see PasswordAuthenticatedUserInterface

     */

    public function getPassword(): string

    {

        return $this->mdp;

    }

}