<?php

namespace App\Controller;

use App\Entity\Pet;
use App\Form\PetType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormTypeInterface;

class AddController extends AbstractController
{
    /**
     * @Route("/add", name="add")
     */
    public function index(Request $request)
    {
        $em = $this->getDoctrine()
            ->getManager();

        $addPet = new Pet();

        $form = $this->createForm(PetType::class, $addPet);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $em->persist($addPet);
            $em->flush();

            return $this->redirectToRoute('index');
        }

        return $this->render('add/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
