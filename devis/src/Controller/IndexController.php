<?php

namespace App\Controller;

use App\Entity\Estimation;
use App\Form\EstimationType;
use App\Repository\EstimationRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

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
     * @return Response
     * @throws \Exception
     */
    public function home(Request $request)
    {
        $estimation = new Estimation();
        $form = $this->createForm(EstimationType::class, $estimation);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $this->em->persist($estimation);
            $this->em->flush();
            dump($estimation);
        }

        return $this->render('index/home.html.twig', array(
            'form' => $form->createView(),
            ));
    }

    /**
     * @Route("/estimation", name="estimation")
     */
    public function estimation()
    {
        return $this->render('index/estimation.html.twig');
    }
}