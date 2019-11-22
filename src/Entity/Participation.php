<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\ParticipationRepository;

/**
 * Participation
 *
 * @ORM\Table(name="participation", indexes={@ORM\Index(name="id_niveau", columns={"id_niveau"})})
 * @ORM\Entity
 */
class Participation
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
     * @var int
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     */
    private $idUser;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_niveau", referencedColumnName="id")
     * })
     */
    private $idNiveau;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    public function setIdUser(int $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getIdNiveau(): ?User
    {
        return $this->idNiveau;
    }

    public function setIdNiveau(?User $idNiveau): self
    {
        $this->idNiveau = $idNiveau;

        return $this;
    }


}
