<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="todos")
 */
class Todo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", length=255)
     */
    private $todo;

    /**
     * @ORM\Column(type="text", length=255)
     */
    private $assignedTo;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dueDate;

    /**
     * @ORM\Column(type="text", length=500)
     */
    private $details;

    /**
     * @ORM\Column(type="text", length=20)
     */
    private $status;

    /**
     * @var
     * @ORM\OneToMany(targetEntity="App\Entity\Comment", mappedBy="todo")
     */
    private $comments;

    public static function create($todo, $assignedTo, $dueDate, $details, $status): Todo
    {
        return new self($todo, $assignedTo, $dueDate, $details, $status);
    }

    public function __construct($todo, $assignedTo, $dueDate, $details, $status)
    {
        $this->todo = $todo;
        $this->assignedTo = $assignedTo;
        $this->dueDate = $dueDate;
        $this->details = $details;
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTodo()
    {
        return $this->todo;
    }

    /**
     * @param mixed $todo
     */
    public function setTodo($todo)
    {
        $this->todo = $todo;
    }

    /**
     * @return mixed
     */
    public function getAssignedTo()
    {
        return $this->assignedTo;
    }

    /**
     * @param mixed $assignedTo
     */
    public function setAssignedTo($assignedTo)
    {
        $this->assignedTo = $assignedTo;
    }

    /**
     * @return mixed
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * @param mixed $dueDate
     */
    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;
    }

    /**
     * @return mixed
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * @param mixed $details
     */
    public function setDetails($details)
    {
        $this->details = $details;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
}
