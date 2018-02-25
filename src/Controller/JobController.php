<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Job;

class JobController extends Controller
{
    /**
     * @Route("/jobs", name="job_index")
     */
    public function index()
    {
        $jobs = $this->getDoctrine()->getRepository(Job::class)->findAll();
        $jobs = $this->formatJobTitles($jobs);

        return $this->render('jobs/index.html.twig', array(
            'jobs' => $jobs,
            'applied' => 'all'
        ));
    }

    /**
     * @Route("/jobs/applied/{status}", name="job_status")
     */
    public function getJobStatus($status)
    {
        $jobs = $this->getDoctrine()->getRepository(Job::class)->findBy(
            ['applied' => $status]
        );
        $jobs = $this->formatJobTitles($jobs);
        
        return $this->render('jobs/index.html.twig', array(
            'jobs' => $jobs,
            'applied' => $status
        ));
    } 

    private function formatJobTitles($jobs) {
        foreach ($jobs as &$job) {
            $job->setTitle(ucwords(strtolower($job->getTitle())));
            $job->setTitle(ucwords($job->getTitle(), '-'));
            $job->setTitle(str_replace("Php", "PHP", $job->getTitle()));
            $job->setTitle(str_replace(".net", ".NET", $job->getTitle()));
            $job->setTitle(str_replace("java", "Java", $job->getTitle()));
            $job->setTitle(str_replace("symfony", "Symfony", $job->getTitle()));
        }
        return $jobs;
    }
}