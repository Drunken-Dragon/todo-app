<?php

namespace App\Form;

use Symfony\Component\Form\Extension\Validator\Constraints as Assert;

class AddCommentRequest
{
    /**
     * @Assert\NotBlank()
     * @Assert\Length(min="25", max="500")
     */
    public $comment;
}
