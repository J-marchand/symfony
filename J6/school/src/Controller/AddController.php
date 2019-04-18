<?php

namespace App\Controller;

use App\Entity\Formation;
use App\Form\FormationType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormTypeInterface;

class AddController extends AbstractController
{
    /**
     * @Route("/add", name="add")
     */
    public function index(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $addFormation = new Formation();

        $form = $this->createForm(FormationType::class, $addFormation);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $em->persist($addFormation);
            $em->flush();

            return $this->redirectToRoute('index');
        }

        return $this->render('add/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
