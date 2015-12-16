<?php

namespace AppBundle\Entity;

use Symfony\Component\Security\Core\Role\Role;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Table("Users")
 * @ORM\Entity
 */
class Users implements UserInterface, \Serializable
{
    /**
     * @ORM\Column(name="iserId", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $userId;

    /**
     * @ORM\Column(name="userName", type="string", length=255)
     */
    private $userName;

    /**
     * @ORM\Column(name="userPassword", type="string", length=255)
     */
    private $userPassword;

    /**
     * @ORM\Column(name="roleString", type="string", length=255)
     */
    private $roleString;
    //methodes uit UserInterface
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->userName,
            $this->password,
            $this->roleString
        ));
    }

    public function unserialize($serialized)
    {
        list (
            $this->userId,
            $this->userName,
            $this->userPassword,
            $this->roleString
            ) = unserialize($serialized);
    }

    public function getRoles()
    {
        return split(' ',$this->roleString);
    }

    public function getPassword()
    {
        return $this->userPassword;
    }

    public function getSalt()
    {
        return null;
    }

    public function getUsername()
    {
        return $this->userName;
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    //toString
    public function __toString()
    {
        return "Entity User, userName= " . $this->userName;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    public function setUserName($userName)
    {
        $this->userName = $userName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserPassword()
    {
        return $this->userPassword;

    }

    /**
     * @param mixed $userPassword
     */
    public function setUserPassword($userPassword)
    {
        $this->userPassword = $userPassword;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRoleString()
    {
        return $this->roleString;
    }

    /**
     * @param mixed $roleString
     */
    public function setRoleString($roleString)
    {
        $this->roleString = $roleString;

        return $this;
    }




}
