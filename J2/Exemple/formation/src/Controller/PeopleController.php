<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class PeopleController extends AbstractController
{
    /**
     * @Route ("/people/{lastName}/{firstName}/{age}",  name="people", requirements={"lastName":"[a-zA-Z]+", "firstName":"[a-zA-Z]+","age":"\d+"})
     */

    public function getPeople($lastName, $firstName, $age)
    {
        return new Response('<ul>
                                        <li>'.$lastName.'</li>
                                        <li>'.$firstName.'</li>
                                        <li>'.$age.'</li>
                                    </ul>');
    }
}