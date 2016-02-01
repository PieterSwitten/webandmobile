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

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return \DateTime
     */
    public function getTijd()
    {
        return $this->tijd;
    }

    /**
     * @param \DateTime $tijd
     */
    public function setTijd($tijd)
    {
        $this->tijd = $tijd;
    }

    /**
     * @return \DateTime
     */
    public function getDatum()
    {
        return $this->datum;
    }

    /**
     * @param \DateTime $datum
     */
    public function setDatum($datum)
    {
        $this->datum = $datum;
    }

    /**
     * @return string
     */
    public function getOpmerkingen()
    {
        return $this->opmerkingen;
    }

    /**
     * @param string $opmerkingen
     */
    public function setOpmerkingen($opmerkingen)
    {
        $this->opmerkingen = $opmerkingen;
    }

    /**
     * @return \Arts
     */
    public function getArtsid()
    {
        return $this->artsid;
    }

    /**
     * @param \Arts $artsid
     */
    public function setArtsid($artsid)
    {
        $this->artsid = $artsid;
    }

    /**
     * @return \User
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * @param \User $userid
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;
    }




}

