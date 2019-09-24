<?php

namespace App\Controller;

use App\Form\Type\DevisType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IndexController extends AbstractController
{
    /**
     * @Route("/index/home")
     */
    public function home()
    {
        $form = $this->createForm(DevisType::class);

        return $this->render('index/home.html.twig', array(
            'form' => $form->createView(),
            ));
    }
}