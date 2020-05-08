<?php

namespace App\Entity;

use App\Repository\MessagerieRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MessagerieRepository::class)
 */
class Messagerie
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
    private $message;

    /**
     * @ORM\ManyToOne(targetEntity=Logement::class, inversedBy="messageries")
     * @ORM\JoinColumn(nullable=false)
     */
    private $locataire;

    /**
     * @ORM\ManyToOne(targetEntity=Logement::class, inversedBy="messageries")
     * @ORM\JoinColumn(nullable=false)
     */
    private $proprietaire;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getLocataire(): ?Logement
    {
        return $this->locataire;
    }

    public function setLocataire(?Logement $locataire): self
    {
        $this->locataire = $locataire;

        return $this;
    }

    public function getProprietaire(): ?Logement
    {
        return $this->proprietaire;
    }

    public function setProprietaire(?Logement $proprietaire): self
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }
}
