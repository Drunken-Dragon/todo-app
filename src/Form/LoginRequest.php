<?php

namespace App\Form;

use Symfony\Component\Form\Extension\Validator\Constraints as Assert;

class LoginRequest
{
    /**
     * @Assert\NotBlank()
     * @Assert\Length(min="2",max="15")
     */
    public $name;

    /**
     * @Assert\NotBlank()
     */
    public $password;
}
