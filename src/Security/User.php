<?php
namespace App\Security;

use Symfony\Component\Security\Core\User\EquatableInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface, EquatableInterface
{
    private $name;
    private $password;
    /**
     * @var array
     */
    private $roles;

    public function __construct($name, $password, array $roles = [])
    {
        $this->name = $name;
        $this->password = $password;
        $this->roles = $roles;
    }

    public function getRoles() : array
    {
        return $this->roles;
    }

    public function getPassword() : string
    {
        return $this->password;
    }

    public function getSalt()
    {
        return null;
    }

    public function getUsername() : string
    {
        return $this->name;
    }

    public function eraseCredentials()
    {
    }

    public function isEqualTo(UserInterface $user)
    {
        if ($user instanceof self) {
            return $this->name === $user->name && $this->password === $user->password;
        }

        return false;
    }
}