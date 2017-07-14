<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User implements UserInterface, \Serializable
{
    /**
     * @ORM\Column(type="integer", name="id")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string", name="username", length=254)
     */
    private $username;
    
    /**
     * @ORM\Column(type="string", name="password", length=254)
     */
    private $password;
    
    /**
     * @ORM\Column(type="string", name="salt", length=254)
     */
    private $salt;
    
    /**
     * @ORM\Column(type="text", name="roles")
     */
    private $roles;
    
    public function __construct() {
        $this->salt = uniqid(mt_rand());
    }
    
    function getId() {
        return $this->id;
    }
    
    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getSalt() {
        return $this->salt;
    }

    function getRoles() {
        return array('ROLE_USER');
    }

    function setUsername($username) {
        $this->username = $username;
        return $this;
    }

    function setPassword($password) {
        $saltedPassword = $password.'{'.$this->salt.'}';
        $this->password = sha1($saltedPassword);
        
        return $this;
    }

    function setSalt($salt) {
        $this->salt = $salt;
        return $this;
    }

    function setRoles(array $roles) {
        $this->roles = serialize($roles);
        return $this;
    }
    
    function eraseCredentials() {
        return;
    }
    
    function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            $this->salt
        ));
    }
    
    function unserialize($serialized) {
        list(
            $this->id,
            $this->username,
            $this->password,
            $this->salt
        ) = unserialize($serialized);
    }
}

