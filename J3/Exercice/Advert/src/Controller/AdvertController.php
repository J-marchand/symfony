<?php

namespace App\Controller;

use App\Form\AdvertType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Advert;


class AdvertController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return new Response(
            header('Location: /listing'),
            exit());
    }

    /**
     * @Route("/listing", name="listing")
     */
    public function listing()
    {
        $advert = $this->getDoctrine()
            ->getRepository(Advert::class)
            ->findAll();

        return $this->render('advert/listing.html.twig', [
            'advert'  => $advert,
        ]);
    }

    /**
     * @Route("/add", name="add")
     */
    public function add(request $request)
    {

        $entityManager = $this->getDoctrine()->getManager();
        $advert = new Advert();

        $form = $this->createForm(AdvertType::class, $advert);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            //$task = $form->getData();
            //dump($task);
            //dump($advert);


            $entityManager->persist($advert);
            $entityManager->flush();

            return $this->redirectToRoute('listing');
        }

        return $this->render('advert/add.html.twig', ['form'=>$form->createView()]);


    }

    /**
     * @Route("/add/confirm", name="addConfirm")
     */
    public function addConfirm()
    {
        var_dump($_POST);

        $title      = $_POST['title'];
        $author     = $_POST['author'];
        $content    = $_POST['content'];

        $entityManager = $this->getDoctrine()->getManager();

        $advert = new Advert();
        $advert->setTitle($title);
        $advert->setDate(new \DateTime());
        $advert->setAuthor($author);
        $advert->setContent($content);
        $advert->setPublished('true');

        $entityManager->persist($advert);

        $entityManager->flush();

        return $this->redirectToRoute('listing');
    }

    /**
     * @Route("/update/{id}", name="update")
     */
    public function update($id, request $request)
    {
        /*$advert = $this->getDoctrine()
            ->getRepository(Advert::class)
            ->find($id);

        return $this->render('advert/update.html.twig', [
            'advert' => $advert,
        ]);*/

        $entityManager = $this->getDoctrine()->getManager();

        $advert = $entityManager->getRepository(Advert::class)
            ->find($id);

        $form = $this->createForm(AdvertType::class, $advert);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            //$task = $form->getData();
            //dump($task);
            //dump($advert);

            $entityManager->flush();

            return $this->redirectToRoute('listing');
        }

        return $this->render('advert/add.html.twig', [
            'form'=>$form->createView(),
        ]);
    }

    /**
     * @Route("/update/{id}/confirm", name="updateConfirm")
     */
    public function updateConfirm($id)
    {

        var_dump($_POST);

        $title      = $_POST['title'];
        $author     = $_POST['author'];
        $content    = $_POST['content'];

        $entityManager = $this->getDoctrine()->getManager();
        $advert = $entityManager->getRepository(Advert::class)->find($id);

        $advert->setTitle($title);
        $advert->setDate(new \DateTime());
        $advert->setAuthor($author);
        $advert->setContent($content);
        $advert->setPublished('true');

        $entityManager->flush();

        return $this->redirectToRoute('listing');
    }

    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function delete($id)
    {
        $advert = $this->getDoctrine()
            ->getRepository(Advert::class)
            ->find($id);




        return $this->render('advert/delete.html.twig', [
            'advert' => $advert,
        ]);
    }

    /**
     * @Route("/delete/{id}/confirm", name="deleteConfirm")
     */
    public function deleteConfirm($id)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $advert = $entityManager
            ->getRepository(Advert::class)
            ->find($id);

        $entityManager->remove($advert);
        $entityManager->flush();

        return $this->redirectToRoute('listing');
    }

    /**
     * @Route("/search", name="search")
     */
    public function search()
    {
        $search = $_POST['search'];

        $entityManager = $this->getDoctrine()->getManager();

        $advert = $entityManager
            ->getRepository(Advert::class)
            ->findBy(
                [
                    'title' => $search
                ]);

        return $this->render('advert/search.html.twig', [
            'advert' => $advert,
            'search' => $search
        ]);
    }

    /**
     * @Route("/searchbydate", name="searchByDate")
     */
    public function searchByDate()
    {
        $search1 = $_POST['date1'];
        $search2 = $_POST['date2'];
        $entityManager = $this->get('doctrine')->getManager();
        $adverts = $entityManager->getRepository(Advert::class)->findByDate($search1, $search2);


        $last = end($adverts);


        return $this->render('advert/searchByDate.html.twig', [
            'adverts' => $adverts
        ]);
    }

    /**
     * @Route("/searchbetween", name="searchBetween")
     */
    public function searchBetween()
    {
        $entityManager = $this->get('doctrine')->getManager();
        $adverts = $entityManager->getRepository(Advert::class)->findAll();
        //$limites = getRepository(Advert::class)->limites($data);

        $first = (current($adverts));
        $last = (end($adverts));


       // var_dump($adverts);
        var_dump($first, $last);

        return $this->render('advert/searchBetween.html.twig', [
            'first' => $first,
            'last'  => $last,
        ]);
    }

    /**
     * @Route("/show/{id}", name="show")
     */
    public function show($id)
    {
        $advert = $this->getDoctrine()
            ->getRepository(Advert::class)
            ->find($id);


        return $this->render('advert/show.html.twig', [
            'advert'  => $advert,
        ]);
    }
}
