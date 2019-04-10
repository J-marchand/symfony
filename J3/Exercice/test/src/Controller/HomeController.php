<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    public $tabInfo = [
        [
            'firstName' => 'Member 1 FirstName',
            'lastName'  => 'Member 1 LastName',
            'email'     => 'Member1@mail.fr',
            'id'        => '0'
        ],
        [
            'firstName' => 'Member 2 FirstName',
            'lastName'  => 'Member 2 LastName',
            'email'     => 'Member2@mail.fr',
            'id'        => '1'
        ]
    ];

    /**
     * @Route("/home", name="home")
     */
    public function index()
    {

        return $this->render('home/index.html.twig', [
            'tabInfo' => $this->tabInfo,
        ]);
    }

    /**
     * @Route("/detail/{id}", name="detail")
     */
    public function detail($id){

        $detailInfo = $this->tabInfo[$id];

        return $this->render('detail_user/index.html.twig', [
            'detailInfo' => $detailInfo,
        ]);
    }
}
