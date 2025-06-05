<?php

namespace App\Form;

use App\Entity\Job;
use App\Entity\JobApplication;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobApplicationTypeForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
            $builder
              ->add('coverLetter', TextareaType::class, [
                'label' => 'Your review',
                'required' => true,
                'attr' => [
                    'rows' => 5,
                    'class' => 'bg-gray-800 w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent',
                    'placeholder' => 'Write your review here...',
                ],
              ])
            // ->add('createdAt', null, [
            //     'widget' => 'single_text',
            // ])
            // ->add('user', EntityType::class, [
            //     'class' => User::class,
            //     'choice_label' => 'id',
            // ])
            // ->add('job', EntityType::class, [
            //     'class' => Job::class,
            //     'choice_label' => 'id',
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => JobApplication::class,
        ]);
    }
}
