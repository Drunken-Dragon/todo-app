<?php

namespace App\Entity;

use App\Controller\AbstractController;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class UserProvider extends AbstractController implements UserProviderInterface
{
    public function supportsClass($class)
    {
        return User::class === $class;
    }

    public function refreshUser(UserInterface $user)
    {
        return $this->loadUserByUsername($user->getUsername());
    }

    public function loadUserByUsername($name)
    {
        $user = $this->getDB()->fetchAssoc('SELECT name, password FROM users WHERE name = ?', [$name]);

        if ($user) {
                return new User(
                    $user['name'],
                    $user['password']
                );
//                just for debugging
                var_dump($user);
                die();
        }

        throw new UsernameNotFoundException(
            sprintf('User "%s" does not exist', $name)
        );
    }
}
