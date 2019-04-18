<?php

namespace App\Controller;

use App\Entity\Formation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FormationController extends AbstractController
{
    /**
     * @Route("/formation/{id}", name="formation")
     */
    public function index($id)
    {
        $em = $this->getDoctrine()
            ->getRepository(Formation::class);

        $formation = $em->find($id);

        return $this->render('formation/index.html.twig', [
            'formation' => $formation,
        ]);
    }
}
