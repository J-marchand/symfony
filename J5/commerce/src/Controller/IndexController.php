<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        $listing = $this->getDoctrine()
        ->getRepository(Product::class)
        ->findAll();


        $category = $this->getDoctrine()
            ->getRepository(Category::class)
            ->findAll();


        return $this->render('index/index.html.twig', [
            'listing' => $listing,
            'category' => $category,
        ]);
    }

    /**
     * @Route("/detail/{id}", name="detail")
     */
    public function detail($id)
    {

        $em = $this->getDoctrine()->getManager();

        $category = $em->getRepository(Category::class)->find($id);
        var_dump($category);


        $listing = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findBy(['category' => $category]);

        var_dump($listing);




        return $this->render('index/detail.html.twig', [

        ]);
    }
}
