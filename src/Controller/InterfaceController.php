<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class InterfaceController extends AbstractController
{
    /**
     * @Route("/bienvenu", name="bienvenu")
     */
    public function bienvenu()
    {
        return $this->render('interface/Bienvenu.html.twig');
    }
    /**
     * @Route("/paiement", name="paiement")
     */
    public function index()
    {
        return $this->render('interface/paiement.html.twig');
    }
     /**
     * @Route("/emplacement", name="emplacement")
     */
    public function emplacement()
    {
        return $this->render('interface/emplacement.html.twig');
    }
}
