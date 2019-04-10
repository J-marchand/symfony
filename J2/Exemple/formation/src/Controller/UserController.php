<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index()
    {
        $userTab = [
            [
                'name'  => 'Pierre',
                'age'   => '12'
            ],
            [
                'name'  => 'Paul',
                'age'   => '14'
            ],
            [
                'name'  => 'Kevin',
                'age'   => '22'
            ],
            [
                'name'  => 'Dany',
                'age'   => '33'
            ],
        ];
        return $this->render('user/index.html.twig', [
            'userTab' => $userTab,
        ]);
    }
}
