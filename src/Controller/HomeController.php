<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="pageLogin")
     */
    public function home( AuthenticationUtils $utils){
        $error = $utils->getLastAuthenticationError();
        $username = $utils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'hasError' => $error !== null,
            'username' => $username
        ]);
    }
}
