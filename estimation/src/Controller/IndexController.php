<?php

namespace App\Controller;

use App\Entity\Estimation;
use App\Form\Type\EstimationType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends AbstractController
{
    /**
     * @Route("/estimation", name="estimation")
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function estimationAction(Request $request)
    {
        $clientId = $request->query->get('id');
        if ($clientId) {
            $estimation = $this->getDoctrine()->getRepository(Estimation::class)->find($clientId);
        } else {
            $estimation = new Estimation();
        }
        $estimation->setDate(new \DateTime('now'));
        $form = $this->createForm(EstimationType::class, $estimation);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $estimation = $form->getData();
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($estimation);
                $entityManager->flush();
                return $this->redirectToRoute('recapitulatif', ['id' =>  $estimation->getClientId()]);
            }
        }
        return $this->render('index/estimation.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/recapitulatif", name="recapitulatif")
     * @param Request $request
     * @return Response
     */
    public function recapitulatifAction(Request $request)
    {
        $clientId = $request->query->get('id');
        $estimation = $this->getDoctrine()->getRepository(Estimation::class)->find($clientId);
        if ($request->isMethod('POST')) {
            $estimation->setValide(true);
            $estimation->setrgpd(true);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($estimation);
            $entityManager->flush();
            return $this->redirectToRoute('total', ['id' =>  $estimation->getClientId()]);
        }
        return $this->render('index/recapitulatif.html.twig', ['estimation' => $estimation, 'clientId' => $estimation->getClientId()]);
    }

    /**
     * @Route("/total", name="total")
     */
    public function totalAction()
    {
        return $this->render('index/total.html.twig');
    }

    /**
     * @Route("/crm", name="crm")
     */
    public function crmAction()
    {
        return $this->render('index/crm.html.twig');
    }
}