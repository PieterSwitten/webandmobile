<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Arts
 *
 * @ORM\Table(name="arts", uniqueConstraints={@ORM\UniqueConstraint(name="userid", columns={"userid"})})
 * @ORM\Entity
 */
class Arts
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
     * @var string
     *
     * @ORM\Column(name="naam", type="string", length=255, nullable=false)
     */
    private $naam;

    /**
     * @var string
     *
     * @ORM\Column(name="acthernaam", type="string", length=255, nullable=false)
     */
    private $acthernaam;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="adress", type="string", length=255, nullable=false)
     */
    private $adress;

    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Please, upload a images.")
     */
    private $profielfoto;


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
     * @var \Locaties
     *
     * @ORM\ManyToOne(targetEntity="Locaties")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="locatieid", referencedColumnName="id")
     * })
     */
    private $locatieid;

    /**
     * @return \Locaties
     */
    public function getLocatieid()
    {
        return $this->locatieid;
    }
    /**
     * @param \Locaties $locatieid
     */
    public function setLocatieid($locatieid)
    {
        $this->locatieid = $locatieid;
    }




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
     * @return string
     */
    public function getNaam()
    {
        return $this->naam;
    }

    /**
     * @param string $naam
     */
    public function setNaam($naam)
    {
        $this->naam = $naam;
    }

    /**
     * @return string
     */
    public function getActhernaam()
    {
        return $this->acthernaam;
    }

    /**
     * @param string $acthernaam
     */
    public function setActhernaam($acthernaam)
    {
        $this->acthernaam = $acthernaam;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * @param string $adress
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;
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

    /**
     * @return string
     */
    public function getProfielfoto()
    {
        return $this->profielfoto;
    }

    /**
     * @param string $profielfoto
     */
    public function setProfielfoto($profielfoto)
    {
        $this->profielfoto = $profielfoto;
    }

}

