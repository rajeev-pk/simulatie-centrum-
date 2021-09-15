<?php

namespace App\Entity;

use App\Repository\DepartmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DepartmentRepository::class)
 */
class Department
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="created")
     */
    private $userId;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="departments")
     */
    private $userID;

    /**
     * @ORM\Column(type="date")
     */
    private $created;

    /**
     * @ORM\OneToMany(targetEntity=Project::class, mappedBy="departmentId")
     */
    private $title;

    public function __construct()
    {
        $this->title = new ArrayCollection();
    }

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

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }

    /**
     * @return Collection|Project[]
     */
    public function getTitle(): Collection
    {
        return $this->title;
    }

    public function addTitle(Project $title): self
    {
        if (!$this->title->contains($title)) {
            $this->title[] = $title;
            $title->setDepartmentId($this);
        }

        return $this;
    }

    public function removeTitle(Project $title): self
    {
        if ($this->title->removeElement($title)) {
            // set the owning side to null (unless already changed)
            if ($title->getDepartmentId() === $this) {
                $title->setDepartmentId(null);
            }
        }

        return $this;
    }
}
