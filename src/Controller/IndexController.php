<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Job;

class IndexController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        $jobs = $this->getDoctrine()->getRepository(Job::class)->findAll();
        foreach ($jobs as &$job) {
            $job->setTitle(ucwords(strtolower($job->getTitle())));
            $job->setTitle(ucwords($job->getTitle(), '-'));
            $job->setTitle(str_replace("Php", "PHP", $job->getTitle()));
            $job->setTitle(str_replace(".net", ".NET", $job->getTitle()));
            $job->setTitle(str_replace("java", "Java", $job->getTitle()));
            $job->setTitle(str_replace("symfony", "Symfony", $job->getTitle()));
        }
        return $this->render('pages/index.html.twig', array(
            'jobs' => $jobs,
        ));
    }
}