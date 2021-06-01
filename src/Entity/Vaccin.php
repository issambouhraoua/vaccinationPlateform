<?php

namespace App\Entity;

use App\Repository\VaccinRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VaccinRepository::class)
 */
class Vaccin
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_vaccin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomVaccin(): ?string
    {
        return $this->nom_vaccin;
    }

    public function setNomVaccin(string $nom_vaccin): self
    {
        $this->nom_vaccin = $nom_vaccin;

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

    public function __toString(): String
    {
        return $this->nom_vaccin;
    }

    
}
