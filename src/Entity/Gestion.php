<?php

namespace App\Entity;

use App\Repository\GestionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GestionRepository::class)
 */
class Gestion
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $incident;

    /**
     * @ORM\Column(type="integer")
     */
    private $travaux;

    /**
     * @ORM\Column(type="integer")
     */
    private $intervention;

    /**
     * @ORM\Column(type="integer")
     */
    private $signalement;

    /**
     * @ORM\ManyToOne(targetEntity=Logement::class, inversedBy="gestions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $logement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIncident(): ?int
    {
        return $this->incident;
    }

    public function setIncident(int $incident): self
    {
        $this->incident = $incident;

        return $this;
    }

    public function getTravaux(): ?int
    {
        return $this->travaux;
    }

    public function setTravaux(int $travaux): self
    {
        $this->travaux = $travaux;

        return $this;
    }

    public function getIntervention(): ?int
    {
        return $this->intervention;
    }

    public function setIntervention(int $intervention): self
    {
        $this->intervention = $intervention;

        return $this;
    }

    public function getSignalement(): ?int
    {
        return $this->signalement;
    }

    public function setSignalement(int $signalement): self
    {
        $this->signalement = $signalement;

        return $this;
    }

    public function getLogement(): ?Logement
    {
        return $this->logement;
    }

    public function setLogement(?Logement $logement): self
    {
        $this->logement = $logement;

        return $this;
    }
}
