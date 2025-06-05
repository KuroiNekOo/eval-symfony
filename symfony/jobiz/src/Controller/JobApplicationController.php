<?php

namespace App\Controller;

use App\Entity\Job;
use App\Entity\JobApplication;
use App\Repository\JobApplicationRepository;
use App\Form\JobApplicationTypeForm;
use App\Repository\JobRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class JobApplicationController extends AbstractController
{
    // #[Route('/job/application', name: 'app_job_application')]
    // public function index(): Response
    // {
    //     return $this->render('job_application/index.html.twig', [
    //         'controller_name' => 'JobApplicationController',
    //     ]);
    // }

    #[Route('/job_application/{id}/form', name: 'app_application_job_form')]
    public function form(Job $job, Request $request, JobApplicationRepository $jobApplicationRepository,
                        Security $security, EntityManagerInterface $em): Response
    {
        $user = $security->getUser();


        $jobApplication = $jobApplicationRepository->findOneBy([
            'job' => $job,
            'user' => $user
        ]);


        if (!$jobApplication) {
            $jobApplication = new JobApplication();
            $jobApplication->setJob($job);
            $jobApplication->setUser($user);
        }


        $form = $this->createForm(JobApplicationTypeForm::class, $jobApplication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $em->persist($jobApplication);
            $em->flush();
        } 
  


        return $this->render('job_application/_form.html.twig', [
            'form' => $form->createView(),
            'job' => $job,
            'jobApplication' => $jobApplication
        ]);
    }
}
