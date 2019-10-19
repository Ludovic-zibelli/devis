<?php
namespace App\Controller;

use App\Entity\Estimation;
use App\Form\Type\EstimationType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Swift_Mailer;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CrmController extends AbstractController
{
    /**
     * @Route("/crm", name="crm")
     *
     * @Security("is_granted('ROLE_ADMIN')")
     */
    public function crmAction()
    {
        $repository = $this->getDoctrine()->getRepository(Estimation::class);
        $clients = $repository->findAll();
        return $this->render('crm/crm.html.twig', ['data' => $clients]);
    }

    /**
     * @Route("/crm/form/{slug}", name="crm_info")
     * @Security("is_granted('ROLE_ADMIN')")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function infoAction(Request $request)
    {
        $clientId = $request->get('slug');
        $repository = $this->getDoctrine()->getRepository(Estimation::class);
        $estimation = $repository->findOneByClientId($clientId);
        $total = $estimation->calcul();
        return $this->render('crm/info.html.twig', ['estimation' => $estimation, 'total' => $total]);
    }

    /**
     * @Route("/crm/form", name="crm_creation")
     * @Security("is_granted('ROLE_ADMIN')")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function formCreationAction(Request $request)
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
                $clientId = $estimation->getClientId();
                return $this->redirectToRoute('crm_info', ['slug' => $clientId]);
            }
        }
        return $this->render('index/estimation.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/crm/form_modif/{slug}", name="crm_modif")
     * @Security("is_granted('ROLE_ADMIN')")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function formModifAction(Request $request)
    {
        $clientId = $request->get('slug');
        $repository = $this->getDoctrine()->getRepository(Estimation::class);
        $estimation = $repository->findOneByClientId($clientId);
        $form = $this->createForm(EstimationType::class, $estimation);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $estimation = $form->getData();
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($estimation);
                $entityManager->flush();
                return $this->redirectToRoute('crm_info', ['slug' => $clientId]);
            }
        }
        return $this->render('index/estimation.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/crm/renvoi/{slug}", name="crm_renvoi")
     * @Security("is_granted('ROLE_ADMIN')")
     * @param Request $request
     * @param Swift_Mailer $mailer
     * @return RedirectResponse|Response
     */
    public function renvoiFormAction(Request $request, Swift_Mailer $mailer)
    {
        $clientId = $request->get('slug');
        $repository = $this->getDoctrine()->getRepository(Estimation::class);
        $estimation = $repository->findOneByClientId($clientId);
        $total = $estimation->calcul();
        $message = (new \Swift_Message('Estimation de votre projet.'))
            ->setFrom('contact@digitaluser.fr')
            ->setTo($estimation->getEmail())
            ->setBody(
                $this->renderView(
                    'index/email-estimation.html.twig',
                    ['estimation' => $estimation, 'total' => $total]
                ),
                'text/html'
            );
        $mailer->send($message);
        return $this->redirectToRoute('crm_info', ['slug' => $clientId]);
    }

    /**
     * @Route("/crm/suppr/{slug}", name="crm_suppr")
     * @Security("is_granted('ROLE_ADMIN')")
     * @param Request $request
     * @return RedirectResponse
     */
    public function suppressionEstimationAction(Request $request)
    {
        $clientId = $request->get('slug');
        $repository = $this->getDoctrine()->getRepository(Estimation::class);
        $estimation = $repository->findOneByClientId($clientId);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($estimation);
        $entityManager->flush();
        return $this->redirectToRoute('crm');
    }
}