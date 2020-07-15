<?php

namespace App\Controller;

use App\Entity\Admin;
use App\Form\InscriptionType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\ORM\EntityManagerInterface;

class SecurityController extends AbstractController
{
    public function __construct(
        EntityManagerInterface $entityManager
        )
    {
        $this->entityManager = $entityManager;
    }
    
    /**
     * Permet de se déconnecter
     * 
     * @Route("/logout", name="account_logout")
     *
     * @return void
     */
    public function logout() {
        return $this->render('security/login.html.twig');
    }

    /**
     * Permet d'afficher le formulaire d'inscription
     *
     * @Route("/register", name="account_register")
     * 
     
     */
    public function register(Request $request, UserPasswordEncoderInterface $encoder) {
        $user = new Admin();

        $form = $this->createForm(InscriptionType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);

            $this->entityManager->persist($user);
            $this->entityManager->flush();

            $this->addFlash(
                'success',
                "Votre compte a bien été créé ! Vous pouvez maintenant vous connecter !"
            );

            return $this->redirectToRoute('account_login');
        }

        return $this->render('security/registration.html.twig', [
            'form' => $form->createView()
        ]);
    }
}