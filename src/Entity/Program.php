<?php

namespace App\Entity;

use App\Repository\ProgramRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProgramRepository::class)]
class Program
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $program_code = null;

    #[ORM\Column(length: 255)]
    private ?string $program_name = null;

    #[ORM\Column(length: 255)]
    private ?string $program_duration = null;

    #[ORM\Column(length: 255)]
    private ?string $certification = null;

    #[ORM\OneToMany(mappedBy: 'program_name', targetEntity: Student::class)]
    private Collection $students;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $program_description = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $program_cost = null;

    #[ORM\OneToMany(mappedBy: 'program', targetEntity: Faculty::class)]
    private Collection $faculty_name;

    public function __construct()
    {
        $this->students = new ArrayCollection();
        $this->faculty_name = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProgramCode(): ?string
    {
        return $this->program_code;
    }

    public function setProgramCode(string $program_code): self
    {
        $this->program_code = $program_code;

        return $this;
    }

    public function getProgramName(): ?string
    {
        return $this->program_name;
    }

    public function setProgramName(string $program_name): self
    {
        $this->program_name = $program_name;

        return $this;
    }

    public function getProgramDuration(): ?string
    {
        return $this->program_duration;
    }

    public function setProgramDuration(string $program_duration): self
    {
        $this->program_duration = $program_duration;

        return $this;
    }

    public function getCertification(): ?string
    {
        return $this->certification;
    }

    public function setCertification(string $certification): self
    {
        $this->certification = $certification;

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
            $student->setProgramName($this);
        }

        return $this;
    }

    public function removeStudent(Student $student): self
    {
        if ($this->students->removeElement($student)) {
            // set the owning side to null (unless already changed)
            if ($student->getProgramName() === $this) {
                $student->setProgramName(null);
            }
        }

        return $this;
    }

    public function getProgramDescription(): ?string
    {
        return $this->program_description;
    }

    public function setProgramDescription(?string $program_description): self
    {
        $this->program_description = $program_description;

        return $this;
    }

    public function getProgramCost(): ?string
    {
        return $this->program_cost;
    }

    public function setProgramCost(string $program_cost): self
    {
        $this->program_cost = $program_cost;

        return $this;
    }

    /**
     * @return Collection<int, Faculty>
     */
    public function getFacultyName(): Collection
    {
        return $this->faculty_name;
    }

    public function addFacultyName(Faculty $facultyName): self
    {
        if (!$this->faculty_name->contains($facultyName)) {
            $this->faculty_name->add($facultyName);
            $facultyName->setProgram($this);
        }

        return $this;
    }

    public function removeFacultyName(Faculty $facultyName): self
    {
        if ($this->faculty_name->removeElement($facultyName)) {
            // set the owning side to null (unless already changed)
            if ($facultyName->getProgram() === $this) {
                $facultyName->setProgram(null);
            }
        }

        return $this;
    }
}
