<?php

namespace App\Entity;

use App\Repository\DocumentsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DocumentsRepository::class)
 */
class Documents
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
    private $etatdeslieux;

    /**
     * @ORM\Column(type="integer")
     */
    private $bail;

    /**
     * @ORM\Column(type="integer")
     */
    private $quitance;

    /**
     * @ORM\ManyToOne(targetEntity=Logement::class, inversedBy="documents")
     * @ORM\JoinColumn(nullable=false)
     */
    private $logoment;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEtatdeslieux(): ?int
    {
        return $this->etatdeslieux;
    }

    public function setEtatdeslieux(int $etatdeslieux): self
    {
        $this->etatdeslieux = $etatdeslieux;

        return $this;
    }

    public function getBail(): ?int
    {
        return $this->bail;
    }

    public function setBail(int $bail): self
    {
        $this->bail = $bail;

        return $this;
    }

    public function getQuitance(): ?int
    {
        return $this->quitance;
    }

    public function setQuitance(int $quitance): self
    {
        $this->quitance = $quitance;

        return $this;
    }

    public function getLogoment(): ?Logement
    {
        return $this->logoment;
    }

    public function setLogoment(?Logement $logoment): self
    {
        $this->logoment = $logoment;

        return $this;
    }
}
