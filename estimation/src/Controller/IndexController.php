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
     * @Route("/estimation")
     * @param Request $request
     * @return Response
     */
    public function estimationAction(Request $request)
    {
        $estimation = new Estimation();
        $form = $this->createForm(EstimationType::class, $estimation);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $estimation = $form->getData();
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($estimation);
                $entityManager->flush();
                return $this->redirectToRoute('');
            }
        }
        return $this->render('index/estimation.html.twig', array(
            'form' => $form->createView(),
            ));
    }

    /**
     * @Route("/crm")
     */
    public function crmAction()
    {
        return $this->render('index/crm.html.twig');
    }
}