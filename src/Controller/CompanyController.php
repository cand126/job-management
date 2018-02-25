<?php

namespace App\Controller;

use App\Entity\Company;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class CompanyController
 * @package App\Controller
 */
class CompanyController extends Controller
{
    /**
     * @Route("/companys", name="company_index")
     */
    public function index()
    {
        $companys = $this->getDoctrine()->getRepository(Company::class)->findAll();

        return $this->render('companys/index.html.twig', [
            'companys' => $companys,
        ]);
    }
}
