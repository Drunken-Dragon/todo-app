<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="users")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comment", mappedBy="user")
     */
    private $comments;

    private $isActive;

    public function __construct($name, $password)
    {
        $this->name = $name;
        $this->password = $password;
        $this->isActive = true;
    }

    public function getUsername()
    {
        return $this->name;
    }

    public function getPassword()
    {
        return $this->password;
    }
}
