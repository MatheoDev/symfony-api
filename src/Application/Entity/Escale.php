<?php

namespace App\Application\Entity;

use App\Application\Repository\EscaleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: EscaleRepository::class)]
class Escale
{
    #[ORM\Id]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    private ?Uuid $id = null;

    #[ORM\Column(length: 255)]
    private ?string $gare = null;

    #[ORM\Column(length: 255)]
    private ?string $voie = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $horaire = null;

    #[ORM\ManyToOne(inversedBy: 'escales')]
    private ?Trajet $trajet = null;

    public function __construct()
    {
    }

    public function getId(): ?Uuid
    {
        return $this->id;
    }

    public function setId(Uuid $id): static {
        $this->id = $id;

        return $this;
    }

    public function getGare(): ?string
    {
        return $this->gare;
    }

    public function setGare(string $gare): static
    {
        $this->gare = $gare;

        return $this;
    }

    public function getVoie(): ?string
    {
        return $this->voie;
    }

    public function setVoie(string $voie): static
    {
        $this->voie = $voie;

        return $this;
    }

    public function getHoraire(): ?\DateTimeInterface
    {
        return $this->horaire;
    }

    public function setHoraire(\DateTimeInterface $horaire): static
    {
        $this->horaire = $horaire;

        return $this;
    }

    public function getTrajet(): ?Trajet
    {
        return $this->trajet;
    }

    public function setTrajet(?Trajet $trajet): static
    {
        $this->trajet = $trajet;

        return $this;
    }
}
