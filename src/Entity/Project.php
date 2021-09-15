<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProjectRepository::class)
 */
class Project
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="projects")
     */
    private $userId;

    /**
     * @ORM\ManyToOne(targetEntity=Department::class, inversedBy="title")
     */
    private $departmentId;

    /**
     * @ORM\Column(type="text")
     */
    private $seoText;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?User
    {
        return $this->userId;
    }

    public function setUserId(?User $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getDepartmentId(): ?Department
    {
        return $this->departmentId;
    }

    public function setDepartmentId(?Department $departmentId): self
    {
        $this->departmentId = $departmentId;

        return $this;
    }

    public function getSeoText(): ?string
    {
        return $this->seoText;
    }

    public function setSeoText(string $seoText): self
    {
        $this->seoText = $seoText;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
