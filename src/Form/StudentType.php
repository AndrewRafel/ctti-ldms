<?php

namespace App\Form;

use App\Entity\Faculty;
use App\Entity\Program;
use App\Entity\Student;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StudentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('student_id')
            ->add('first_name')
            ->add('last_name')
            ->add('nrc')
            ->add('email')
            ->add('phone_number')
            ->add('address')
            ->add('sponsor')
            ->add('gender')
            ->add('accommodation_status')
            ->add('disability')
            ->add('faculty_name')
            ->add('program_name')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['data_class' => Student::class,Faculty::class,Program::class ]);
    }
}
