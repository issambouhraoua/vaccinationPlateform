<?php

namespace App\Entity;

use App\Repository\CentreVaccinationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CentreVaccinationRepository::class)
 */
class CentreVaccination
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
    private $nom_centre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nombre_vaccin_disponible;

    /**
     * @ORM\OneToMany(targetEntity=Vaccination::class, mappedBy="centreVaccination")
     */
    private $vaccinations;

    public function __construct()
    {
        $this->vaccinations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCentre(): ?string
    {
        return $this->nom_centre;
    }

    public function setNomCentre(string $nom_centre): self
    {
        $this->nom_centre = $nom_centre;

        return $this;
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

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getNombreVaccinDisponible(): ?int
    {
        return $this->nombre_vaccin_disponible;
    }

    public function setNombreVaccinDisponible(?int $nombre_vaccin_disponible): self
    {
        $this->nombre_vaccin_disponible = $nombre_vaccin_disponible;

        return $this;
    }

    /**
     * @return Collection|Vaccination[]
     */
    public function getVaccinations(): Collection
    {
        return $this->vaccinations;
    }

    public function addVaccination(Vaccination $vaccination): self
    {
        if (!$this->vaccinations->contains($vaccination)) {
            $this->vaccinations[] = $vaccination;
            $vaccination->setCentreVaccination($this);
        }

        return $this;
    }

    public function removeVaccination(Vaccination $vaccination): self
    {
        if ($this->vaccinations->removeElement($vaccination)) {
            // set the owning side to null (unless already changed)
            if ($vaccination->getCentreVaccination() === $this) {
                $vaccination->setCentreVaccination(null);
            }
        }

        return $this;
    }

    public function __toString(): String
    {
        return $this->nom_centre;
    }
}
