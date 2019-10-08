<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CrmController extends AbstractController
{
    /**
     * @Route("/crm", name="crm")
     */
    public function crmAction()
    {
        return $this->render('crm/crm.html.twig');
    }
}