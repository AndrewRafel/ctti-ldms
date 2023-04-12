<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudentRepository::class)]
class Student
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $student_id = null;

    #[ORM\Column(length: 255)]
    private ?string $first_name = null;

    #[ORM\Column(length: 255)]
    private ?string $last_name = null;

    #[ORM\Column(length: 13)]
    private ?string $nrc = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 15)]
    private ?string $phone_number = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column(length: 255)]
    private ?string $sponsor = null;

    #[ORM\Column(length: 255)]
    private ?string $gender = null;

    #[ORM\Column(length: 255)]
    private ?string $accommodation_status = null;

    #[ORM\Column(length: 255)]
    private ?string $disability = null;

    #[ORM\ManyToOne(inversedBy: 'students')]
    private ?Faculty $faculty_name = null;

    #[ORM\ManyToOne(inversedBy: 'students')]
    private ?Program $program_name = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStudentId(): ?int
    {
        return $this->student_id;
    }

    public function setStudentId(int $student_id): self
    {
        $this->student_id = $student_id;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getNrc(): ?string
    {
        return $this->nrc;
    }

    public function setNrc(string $nrc): self
    {
        $this->nrc = $nrc;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

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

    public function getPhoneNumber(): ?string
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(string $phone_number): self
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getSponsor(): ?string
    {
        return $this->sponsor;
    }

    public function setSponsor(string $sponsor): self
    {
        $this->sponsor = $sponsor;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getAccommodationStatus(): ?string
    {
        return $this->accommodation_status;
    }

    public function setAccommodationStatus(string $accommodation_status): self
    {
        $this->accommodation_status = $accommodation_status;

        return $this;
    }

    public function getFaculty(): ?string
    {
        return $this->faculty_name;
    }

    public function setFaculty(string $faculty): self
    {
        $this->faculty_name = $faculty;

        return $this;
    }

    public function getDisability(): ?string
    {
        return $this->disability;
    }

    public function setDisability(string $disability): self
    {
        $this->disability = $disability;

        return $this;
    }

    public function getFacultyName(): ?Faculty
    {
        return $this->faculty_name;
    }

    public function setFacultyName(?Faculty $faculty_name): self
    {
        $this->faculty_name = $faculty_name;

        return $this;
    }
}
