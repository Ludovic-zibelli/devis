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
    private $marketing_prix;
    private $domaine;
    private $hebergment;

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
            $prix_page = $estimation->getNombrePage()* 157;
            $marketing = $estimation->getPrestationWebmarketing();
            $depot = $estimation->getDepotDomaine();
            $hebergement = $estimation->getGestionHebergement();

            if($marketing == 'aucun')
            {
                $this->marketing_prix = 0;

            }
            if ($marketing == 'referencement_naturel')
            {
                $this->marketing_prix = 125;
            }
            if ($marketing == 'redaction_web')
            {
                $this->marketing_prix = 156;
            }
            if ($marketing == 'campagne_marketing')
            {
                $this->marketing_prix = 230;
            }

            if($depot == true)
            {
                $this->domaine = 50;
            }
            if($depot == false)
            {
                $this->domaine = 0;
            }
            if($hebergement == true)
            {
                $this->hebergment = 50;
            }
            if($hebergement == false)
            {
                $this->hebergment = 0;
            }


            $prix = $this->marketing_prix + $prix_page + $this->hebergment + $this ->domaine ;
            //$this->em->persist($estimation);
            //$this->em->flush();
            dump($depot);
            //return $this->redirectToRoute('estimation');
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