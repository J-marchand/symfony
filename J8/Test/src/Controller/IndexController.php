<?php

namespace App\Controller;

use App\hello;
use App\service;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(\Swift_Mailer $mailer)
    {

        /*ab = [
            'age ' => $hello->age,
            'locale' => $hello->locale
        ];*/


        $message = (new \Swift_Message('Hello Email'))
            ->setFrom('rphlmarchand@gmail.com')
            ->setTo('j.marchand.dev@gmail.com')
            ->setBody(
                $this->renderView(
                // templates/emails/registration.html.twig
                    'index/index.html.twig'
                ),
                'text/html'
            );

        $mailer->send($message);

        return $this->render($message);

    }
}
