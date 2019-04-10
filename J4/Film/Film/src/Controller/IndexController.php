<?php

namespace App\Controller;

use App\Entity\Film;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        $film = $this->getDoctrine()
            ->getRepository(Film::class)
            ->findAll();

        return $this->render('index/index.html.twig', [
            'film' => $film,
        ]);
    }

    /**
     * @Route("/show/{id}", name="show")
     */
    public function showDetail($id)
    {
        $film = $this->getDoctrine()
        ->getRepository(Film::class)
        ->find($id);

        $befor = ($id - 1);
        $after = (intval($id + 1));

        var_dump($id, $after);

        return $this->render('show/show.html.twig', [
            'film' => $film,
            'befor' => $befor,
            'after' => $after,
        ]);
    }
}
