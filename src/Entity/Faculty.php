<?php

namespace App\Entity;

use App\Repository\FacultyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FacultyRepository::class)]
class Faculty
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $faculty_id = null;

    #[ORM\Column(length: 255)]
    private ?string $faculty_name = null;

    #[ORM\OneToMany(mappedBy: 'faculty_name', targetEntity: Student::class)]
    private Collection $students;

    public function __construct()
    {
        $this->students = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFacultyId(): ?string
    {
        return $this->faculty_id;
    }

    public function setFacultyId(string $faculty_id): self
    {
        $this->faculty_id = $faculty_id;

        return $this;
    }

    public function getFacultyName(): ?string
    {
        return $this->faculty_name;
    }

    public function setFacultyName(string $faculty_name): self
    {
        $this->faculty_name = $faculty_name;

        return $this;
    }

    /**
     * @return Collection<int, Student>
     */
    public function getStudents(): Collection
    {
        return $this->students;
    }

    public function addStudent(Student $student): self
    {
        if (!$this->students->contains($student)) {
            $this->students->add($student);
            $student->setFacultyName($this);
        }

        return $this;
    }

    public function removeStudent(Student $student): self
    {
        if ($this->students->removeElement($student)) {
            // set the owning side to null (unless already changed)
            if ($student->getFacultyName() === $this) {
                $student->setFacultyName(null);
            }
        }

        return $this;
    }
}
