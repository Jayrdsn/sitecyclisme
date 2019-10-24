<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Adresse
 *
 * @ORM\Table(name="adresse")
 * @ORM\Entity
 */
class Adresse
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_adresse", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAdresse;

    /**
     * @var string
     *
     * @ORM\Column(name="nrue", type="string", length=5, nullable=false)
     */
    private $nrue;

    /**
     * @var string
     *
     * @ORM\Column(name="rue", type="string", length=60, nullable=false)
     */
    private $rue;

    /**
     * @var string
     *
     * @ORM\Column(name="codepostal", type="string", length=5, nullable=false)
     */
    private $codepostal;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=50, nullable=false)
     */
    private $ville;

    public function getIdAdresse(): ?int
    {
        return $this->idAdresse;
    }

    public function getNrue(): ?string
    {
        return $this->nrue;
    }

    public function setNrue(string $nrue): self
    {
        $this->nrue = $nrue;

        return $this;
    }

    public function getRue(): ?string
    {
        return $this->rue;
    }

    public function setRue(string $rue): self
    {
        $this->rue = $rue;

        return $this;
    }

    public function getCodepostal(): ?string
    {
        return $this->codepostal;
    }

    public function setCodepostal(string $codepostal): self
    {
        $this->codepostal = $codepostal;

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


}
