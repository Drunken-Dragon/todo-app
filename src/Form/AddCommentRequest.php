<?php

namespace App\Form;

use App\Entity\Todo;
use App\Entity\User;
use Symfony\Component\Form\Extension\Validator\Constraints as Assert;

class AddCommentRequest
{
    public function __construct(Todo $todo, User $user)
    {
        $this->todo = $todo;
        $this->user = $user;
    }

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min="25", max="500")
     */
    public $comment;

    public $todo;

    public $user;
}
