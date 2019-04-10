<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ForumController extends AbstractController{

    public function Forum($year, $mounth, $id, $title){

        return new Response('Vous etes sur le debat symfony de l\'année ' .$year. ' du mois de ' .$mounth. '. <br> L\'id de ce débat est le n*' .$id. '. <br>' .$title);

    }
}