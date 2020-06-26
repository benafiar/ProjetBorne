<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Form\SearchForm;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ProduitController extends AbstractController
{
    /**
     * @Route("/produit", name="produit")
     */
    public function index(ProduitRepository $repository, Request $request)
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
}
