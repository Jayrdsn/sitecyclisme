<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Nivcat
 *
 * @ORM\Table(name="nivcat", indexes={@ORM\Index(name="id_discipline", columns={"id_discipline"}), @ORM\Index(name="id_niveau", columns={"id_niveau"})})
 * @ORM\Entity
 */
class Nivcat
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


}
