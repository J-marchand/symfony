<?php

namespace App\Controller;

use App\Entity\Formation;
use App\Entity\Module;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        $allFormation = $this->getDoctrine()
            ->getRepository(Formation::class)
            ->findAll();

        return $this->render('index/index.html.twig', [
            'all' => $allFormation,
        ]);
    }
}
