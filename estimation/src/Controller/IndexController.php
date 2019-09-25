<?php

namespace App\Controller;

use App\Form\Type\EstimationType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IndexController extends AbstractController
{
    /**
     * @Route("/estimation")
     */
    public function estimation()
    {
        $form = $this->createForm(EstimationType::class);

        return $this->render('index/estimation.html.twig', array(
            'form' => $form->createView(),
            ));
    }
}