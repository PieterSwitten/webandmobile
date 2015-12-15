<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Appointment
 *
 * @ORM\Table(name="Appointment", indexes={@ORM\Index(name="patient", columns={"patient"}), @ORM\Index(name="doctor", columns={"doctor"})})
 * @ORM\Entity
 */
class Appointment
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
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private $date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_hour", type="time", nullable=true)
     */
    private $startHour;

    /**
     * @var string
     *
     * @ORM\Column(name="symptoms", type="string", length=10000, nullable=true)
     */
    private $symptoms;

    /**
     * @var boolean
     *
     * @ORM\Column(name="block", type="boolean", nullable=true)
     */
    private $block;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="patient", referencedColumnName="id")
     * })
     */
    private $patient;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="doctor", referencedColumnName="id")
     * })
     */
    private $doctor;


}

