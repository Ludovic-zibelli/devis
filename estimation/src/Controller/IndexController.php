<?php
namespace App\Controller;

use App\Entity\Estimation;
use App\Form\Type\EstimationType;
use DateTime;
use Exception;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class IndexController extends AbstractController
{
    /**
     * @Route("/estimation", name="estimation")
     * @param Request $request
     * @return Response
     */
    public function estimationAction(Request $request)
    {
        $session = new Session();

        if (!$session->getId()) {
            $estimation = new Estimation();
        } else {
            $estimation = $session->get('estimation');
        }
        $form = $this->createForm(EstimationType::class, $estimation);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $estimation = $form->getData();
                $session->set('estimation', $estimation);
                return $this->redirectToRoute('recapitulatif');
            }
        }
        return $this->render('index/estimation.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/recapitulatif", name="recapitulatif")
     * @param Request $request
     * @return Response
     * @throws Exception
     */
    public function recapitulatifAction(Request $request)
    {
        $session = new Session();
        $estimation = $session->get('estimation');

        if ($request->isMethod('POST')) {
             $estimation->setrgpd(true);
            $estimation->setDate(new DateTime('now'));
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($estimation);
            $entityManager->flush();
            return $this->redirectToRoute('total');
        }
        return $this->render('index/recapitulatif.html.twig', ['estimation' => $estimation]);
    }

    /**
     * @Route("/total", name="total")
     */
    public function totalAction()
    {
        $session = new Session();
        $estimation = $session->get('estimation');
        $total = $estimation->calcul();
        return $this->render('index/total.html.twig', ['estimation' => $estimation, 'total' => $total]);
    }
}