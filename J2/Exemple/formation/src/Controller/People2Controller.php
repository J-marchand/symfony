<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class People2Controller extends AbstractController
{
    /**
     * @Route("/people2", name="people2")
     */
    public function index()
    {
        $Title      = 'Bonjour';
        $tabInf     = [
            [
                'firstName'  => 'Emmanuel',
                'lastName'   => 'Macron',
                'age'        => 42
            ],
            [
                'firstName'  => 'Jean-Marie',
                'lastName'   => 'Marchand',
                'age'        => 22
            ],
            [
                'firstName'  => 'Charles',
                'lastName'   => 'Junior',
                'age'        => 27
            ]
        ];


        return $this->render('people2/index.html.twig', [
            'Title'     => $Title,
            'tabInf' => $tabInf
        ]);
    }
}
