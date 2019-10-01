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
        $estimation = new Estimation();
        $estimation->setClientId(random_int(100, 1000000));
        $estimation->setDate(new \DateTime('now'));

        $form = $this->createForm(EstimationType::class, $estimation);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $estimation = $form->getData();
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($estimation);
                $entityManager->flush();
                return $this->redirectToRoute('verification', ['id' =>  $estimation->getId()]);
            }
        }
        return $this->render('index/estimation.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/verification", name="verification")
     * @param Request $request
     * @return Response
     */
    public function verificationAction(Request $request)
    {
        $id = (int) $request->query->get('id');
        $estimation = $this->getDoctrine()->getRepository(Estimation::class)->find($id);
        var_dump($estimation);exit;
        return $this->render('index/verification.html.twig', ['estimation' => $estimation]);
    }

    /**
     * @Route("/crm", name="crm")
     */
    public function crmAction()
    {
        return $this->render('index/crm.html.twig');
    }
}