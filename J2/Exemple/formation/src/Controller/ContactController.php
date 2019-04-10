<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;


class ContactController extends AbstractController
{
    public function calcul($choice, $ch1, $ch2)
    {
        if($choice == 'multiplication'){

            $result = ($ch1*$ch2);
            return new Response('Le resultat de ' .$ch1. ' * ' .$ch2. ' = ' .$result);

        } elseif($choice == 'division'){

            $result = ($ch1/$ch2);
            return new Response('Le resultat de ' .$ch1. ' / ' .$ch2. ' = ' .$result);

        } elseif($choice == 'addition'){

            $result = ($ch1+$ch2);
            return new Response('Le resultat de ' .$ch1. ' + ' .$ch2. ' = ' .$result);

        } elseif($choice == 'soustraction') {

            $result = ($ch1-$ch2);
            return new Response('Le resultat de ' .$ch1. ' - ' .$ch2. ' = ' .$result);
        }
    }


}



