<?php
namespace App\Security;

use Doctrine\DBAL\Connection;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class UserProvider implements UserProviderInterface
{
    private $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    public function supportsClass($class) : bool
    {
        return User::class === $class;
    }

    public function refreshUser(UserInterface $user)
    {
        return $this->loadUserByUsername($user->getUsername());
    }

    public function loadUserByUsername($name)
    {
        $user = $this->db->fetchAssoc('SELECT name, password FROM users WHERE name = ?', [$name]);

        if ($user) {
            return new User($user['name'], $user['password'], ['ROLE_USER']);
        }

        throw new UsernameNotFoundException(sprintf('User "%s" does not exist', $name));
    }
}
