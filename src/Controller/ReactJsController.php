<?php
namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class ReactJsController extends AbstractController
{ 
    /**
    * @Route("/reactjs", name="home")
    */
    public function index()
    {
        return $this->render('reactJs/index.html.twig');
    }
}