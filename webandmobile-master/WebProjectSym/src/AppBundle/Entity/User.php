<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User implements UserInterface, \Serializable
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $rolesstring;


    /**
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set rolesstring
     *
     * @param string $rolesstring
     *
     * @return User
     */
    public function setRolesstring($rolesstring)
    {
        $this->rolesstring = $rolesstring;

        return $this;
    }

    /**
     * Get rolesstring
     *
     * @return string
     */
    public function getRolesstring()
    {
        return $this->rolesstring;
    }

    public function eraseCredentials()
    {
    }

    public function getRoles()
    {
        return split(' ',$this->rolesstring);
    }

    public function getSalt()
    {
        return null;
    }
    //methodes uit Serializable

    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            $this->rolesstring
        ));
    }

    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->user,
            $this->password,
            $this->rolesstring
            ) = unserialize($serialized);
    }
}
