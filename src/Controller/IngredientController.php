<?php

namespace App\Controller;

use App\Entity\Ingredient;
use App\Repository\IngredientRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IngredientController extends AbstractController
{
    /**
     * @Route("/ingredient", name="ingredient")
     */
    public function ingredient(IngredientRepository $repo, Ingredient $ingredients = null)
    {
        if (!$ingredients) {
            $ingredients = new Ingredient();
        }
        $ingredients = $repo->findAll();
        return $this->render('ingredient/index.html.twig', [
            
            'ingredients' => $ingredients
            
        ]);
    }

     /**
     * @Route("/panierIng/add/{id}", name="cartIng_add")
     */
    public function cart_add($id, SessionInterface $session)
    {
        $panier =  $session->get('panier', []);

        if (!empty($panier[$id])) {
            $panier[$id]++;
        } else {
            $panier[$id] = 1;
        }

        $session->set('panier', $panier);

        return $this->redirectToRoute("ingredient");
    }

     /**
     * @Route("/panier", name="cart_index")
     */
    public function panier(IngredientRepository $ingRepository, SessionInterface $session)
    {
        $panier =  $session->get('panier', []);

        $panierWithData = [];

        foreach ($panier as $id => $quantity) {
            $panierWithData[] = [
                'ingredient' => $ingRepository->find($id),
                'quantity' => $quantity
            ];
        }
        //dd($panierWithData);

        return $this->render('produit/panier.html.twig', [
            'itemm' =>  $panierWithData
        ]);
    }
}
