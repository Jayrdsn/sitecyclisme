<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\NivdisciRepository;

/**
 * Nivdisci
 *
 * @ORM\Table(name="nivdisci", indexes={@ORM\Index(name="id_discipline", columns={"id_discipline"}), @ORM\Index(name="id_niveau", columns={"id_niveau"})})
 * @ORM\Entity
 */
class Nivdisci
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Discipline
     *
     * @ORM\ManyToOne(targetEntity="Discipline")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_discipline", referencedColumnName="id")
     * })
     */
    private $idDiscipline;

    /**
     * @var \Niveau
     *
     * @ORM\ManyToOne(targetEntity="Niveau")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_niveau", referencedColumnName="id")
     * })
     */
    private $idNiveau;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdDiscipline(): ?Discipline
    {
        return $this->idDiscipline;
    }

    public function setIdDiscipline(?Discipline $idDiscipline): self
    {
        $this->idDiscipline = $idDiscipline;

        return $this;
    }

    public function getIdNiveau(): ?Niveau
    {
        return $this->idNiveau;
    }

    public function setIdNiveau(?Niveau $idNiveau): self
    {
        $this->idNiveau = $idNiveau;

        return $this;
    }
    public function __toString()
    {
        $niv = "Niveau : ".(string)$this->idNiveau->getNiveau() ;
        return  $niv."   Discipiline : ".$this->getIdDiscipline()->getLibelle() ;
    }

}
