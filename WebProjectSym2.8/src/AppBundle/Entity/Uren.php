<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Uren
 *
 * @ORM\Table(name="uren", uniqueConstraints={@ORM\UniqueConstraint(name="artsid", columns={"artsid"}), @ORM\UniqueConstraint(name="userid", columns={"userid"})})
 * @ORM\Entity
 */
class Uren
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="tijd", type="time", nullable=false)
     */
    private $tijd;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datum", type="date", nullable=false)
     */
    private $datum;

    /**
     * @var string
     *
     * @ORM\Column(name="opmerkingen", type="string", length=1000, nullable=false)
     */
    private $opmerkingen;

    /**
     * @var \Arts
     *
     * @ORM\ManyToOne(targetEntity="Arts")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="artsid", referencedColumnName="id")
     * })
     */
    private $artsid;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="userid", referencedColumnName="id")
     * })
     */
    private $userid;


}

