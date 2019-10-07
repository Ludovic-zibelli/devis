<?php

namespace App\Controller;

use App\Form\EstimationType;
use App\Repository\EstimationRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IndexController extends AbstractController
{
    /**
     * @var EstimationRepository
     */
    private $repository;

    private $em;

    /**
     * IndexController constructor.
     * @param EstimationRepository $repository
     * @param ObjectManager $em
     */
    public function __construct(EstimationRepository $repository, ObjectManager $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/" , name="home")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function home(Request $request)
    {
        $form = $this->createForm(EstimationType::class);

        return $this->render('index/home.html.twig', array(
            'form' => $form->createView(),
            ));
    }
}