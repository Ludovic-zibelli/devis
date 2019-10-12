<?php
namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
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
        return $this->render('crm/crm.html.twig');
    }
}