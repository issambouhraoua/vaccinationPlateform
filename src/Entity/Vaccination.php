<?php

namespace App\Entity;

use App\Repository\VaccinationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VaccinationRepository::class)
 */
class Vaccination
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Patient::class, inversedBy="vaccinations")
     */
    private $patient;

    /**
     * @ORM\ManyToOne(targetEntity=Vaccin::class)
     */
    private $vaccin;

    /**
     * @ORM\ManyToOne(targetEntity=CentreVaccination::class, inversedBy="vaccinations")
     */
    private $centreVaccination;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $statut;

    /**
     * @ORM\Column(type="date")
     */
    private $date_vaccination;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPatient(): ?Patient
    {
        return $this->patient;
    }

    public function setPatient(?Patient $patient): self
    {
        $this->patient = $patient;

        return $this;
    }

    public function getVaccin(): ?Vaccin
    {
        return $this->vaccin;
    }

    public function setVaccin(?Vaccin $vaccin): self
    {
        $this->vaccin = $vaccin;

        return $this;
    }

    public function getCentreVaccination(): ?CentreVaccination
    {
        return $this->centreVaccination;
    }

    public function setCentreVaccination(?CentreVaccination $centreVaccination): self
    {
        $this->centreVaccination = $centreVaccination;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getDateVaccination(): ?\DateTimeInterface
    {
        return $this->date_vaccination;
    }

    public function setDateVaccination(\DateTimeInterface $date_vaccination): self
    {
        $this->date_vaccination = $date_vaccination;

        return $this;
    }
}
