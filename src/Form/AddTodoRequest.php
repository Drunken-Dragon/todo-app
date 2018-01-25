<?php

namespace App\Form;

use Symfony\Component\Form\Extension\Validator\Constraints as Assert;

class AddTodoRequest
{
    /**
     * @Assert\NotBlank()
     * @Assert\Length(min="3", max="255")
     */
    public $todo;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min="25", max="500")
     */
    public $details;

    /**
     * @Assert\NotBlank()
     */
    public $assigned_to;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min="25", max="500")
     */
    public $due_date;

    /**
     * @Assert\NotBlank()
     */
    public $status;
}
