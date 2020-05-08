<?php

namespace App\Entity;

use App\Repository\LogementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LogementRepository::class)
 */
class Logement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="integer")
     */
    private $surface;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbrdepiece;

    /**
     * @ORM\Column(type="date")
     */
    private $datedentrer;

    /**
     * @ORM\Column(type="date")
     */
    private $datedesortie;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $loyer;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="logements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $locataire;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="logements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $proprietaire;

    /**
     * @ORM\OneToMany(targetEntity=Messagerie::class, mappedBy="locataire")
     */
    private $messageries;

    /**
     * @ORM\OneToMany(targetEntity=Documents::class, mappedBy="logoment")
     */
    private $documents;

    /**
     * @ORM\OneToMany(targetEntity=Gestion::class, mappedBy="logement")
     */
    private $gestions;

    public function __construct()
    {
        $this->messageries = new ArrayCollection();
        $this->documents = new ArrayCollection();
        $this->gestions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
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

    public function getNbrdepiece(): ?int
    {
        return $this->nbrdepiece;
    }

    public function setNbrdepiece(int $nbrdepiece): self
    {
        $this->nbrdepiece = $nbrdepiece;

        return $this;
    }

    public function getDatedentrer(): ?\DateTimeInterface
    {
        return $this->datedentrer;
    }

    public function setDatedentrer(\DateTimeInterface $datedentrer): self
    {
        $this->datedentrer = $datedentrer;

        return $this;
    }

    public function getDatedesortie(): ?\DateTimeInterface
    {
        return $this->datedesortie;
    }

    public function setDatedesortie(\DateTimeInterface $datedesortie): self
    {
        $this->datedesortie = $datedesortie;

        return $this;
    }

    public function getLoyer(): ?string
    {
        return $this->loyer;
    }

    public function setLoyer(string $loyer): self
    {
        $this->loyer = $loyer;

        return $this;
    }

    public function getLocataire(): ?User
    {
        return $this->locataire;
    }

    public function setLocataire(?User $locataire): self
    {
        $this->locataire = $locataire;

        return $this;
    }

    public function getProprietaire(): ?User
    {
        return $this->proprietaire;
    }

    public function setProprietaire(?User $proprietaire): self
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }

    /**
     * @return Collection|Messagerie[]
     */
    public function getMessageries(): Collection
    {
        return $this->messageries;
    }

    public function addMessagery(Messagerie $messagery): self
    {
        if (!$this->messageries->contains($messagery)) {
            $this->messageries[] = $messagery;
            $messagery->setLocataire($this);
        }

        return $this;
    }

    public function removeMessagery(Messagerie $messagery): self
    {
        if ($this->messageries->contains($messagery)) {
            $this->messageries->removeElement($messagery);
            // set the owning side to null (unless already changed)
            if ($messagery->getLocataire() === $this) {
                $messagery->setLocataire(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Documents[]
     */
    public function getDocuments(): Collection
    {
        return $this->documents;
    }

    public function addDocument(Documents $document): self
    {
        if (!$this->documents->contains($document)) {
            $this->documents[] = $document;
            $document->setLogoment($this);
        }

        return $this;
    }

    public function removeDocument(Documents $document): self
    {
        if ($this->documents->contains($document)) {
            $this->documents->removeElement($document);
            // set the owning side to null (unless already changed)
            if ($document->getLogoment() === $this) {
                $document->setLogoment(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Gestion[]
     */
    public function getGestions(): Collection
    {
        return $this->gestions;
    }

    public function addGestion(Gestion $gestion): self
    {
        if (!$this->gestions->contains($gestion)) {
            $this->gestions[] = $gestion;
            $gestion->setLogement($this);
        }

        return $this;
    }

    public function removeGestion(Gestion $gestion): self
    {
        if ($this->gestions->contains($gestion)) {
            $this->gestions->removeElement($gestion);
            // set the owning side to null (unless already changed)
            if ($gestion->getLogement() === $this) {
                $gestion->setLogement(null);
            }
        }

        return $this;
    }
}
