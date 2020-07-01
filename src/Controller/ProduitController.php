<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Data\SearchData;
use App\Form\SearchForm;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ProduitController extends AbstractController
{
    /**
     * @Route("/produits", name="produits")
     */
    public function index(ProduitRepository $repository, Request $request)
    {
        $products = $this->getDoctrine()
            ->getRepository(Produit::class)
            ->findAll();

        $data =  $this->get('serializer')->serialize($products, 'json');

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;

    }
     /**
     * @Route("/produit", name="produit")
     */
    public function produits(ProduitRepository $repository, Request $request)
    {   
        $data=new SearchData();
        $form = $this->createForm(SearchForm::class,$data);
        $form ->handleRequest($request);
        $products=$repository->findSearch( $data);
        return $this->render('produit/index.html.twig', [
            'products' => $products,
            'form'=>$form->createView()
        ]);
    }

    /**
     * @Route("/panier/add/{id}", name="cart_add")
     */
    public function cart_add( $id, SessionInterface $session)
    {  
       
       $panier =  $session->get('panier',[]);

       if( !empty($panier[$id])){
        $panier[$id]++;
       } else{
           $panier[$id]=1;
       }

       $session->set('panier',$panier);

       return $this->redirectToRoute("produit");


    }

     /**
     * @Route("/panier", name="cart_index")
     */
    public function panier( ProduitRepository $productRepository, SessionInterface $session)
    {  
       
       $panier =  $session->get('panier',[]);

       $panierWithData = [];

       foreach($panier as $id => $quantity){
        $panierWithData[] =[
            'product'=>$productRepository->find($id),
            'quantity'=>$quantity
        ];
       }
       //dd($panierWithData);

      $total =0;
       foreach( $panierWithData as $item){
           $totalItem = $item['product']->getPrix() * $item['quantity'];
           $total+= $totalItem;
       }

       return $this->render('produit/panier.html.twig', [
            'items' =>  $panierWithData,
            'total' =>  $total
    ]);
    }

      /**
     * @Route("/panier/remove/{id}", name="cart_remove")
     */
    public function remove( $id, SessionInterface $session)
    {  
       
       $panier =  $session->get('panier',[]);

       if(! empty($panier[$id])){
           unset($panier[$id]);
       }

       $session->set('panier',$panier);

       return $this->redirectToRoute("cart_index");
    }
}

