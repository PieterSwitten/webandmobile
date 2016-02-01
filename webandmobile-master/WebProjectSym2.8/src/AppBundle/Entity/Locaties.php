<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Locaties
 *
 * @ORM\Table(name="locaties")
 * @ORM\Entity
 */
class Locaties
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
     * @ORM\Column(name="lokaal", type="string", length=255, nullable=false)
     */
    private $lokaal;

    /**
     * @var string
     *
     * @ORM\Column(name="adres", type="string", length=255, nullable=false)
     */
    private $adres;

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
    public function getLokaal()
    {
        return $this->lokaal;
    }

    /**
     * @param string $lokaal
     */
    public function setLokaal($lokaal)
    {
        $this->lokaal = $lokaal;
    }

    /**
     * @return string
     */
    public function getAdres()
    {
        return $this->adres;
    }

    /**
     * @param string $adres
     */
    public function setAdres($adres)
    {
        $this->adres = $adres;
    }




}

