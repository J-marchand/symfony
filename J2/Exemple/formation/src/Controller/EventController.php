<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EventController extends AbstractController
{
    /**
     * @Route("/event", name="event")
     */
    public function index()
    {
        $eventTab = [
            [
                'eventName'   => 'Conference Laravel',
                'eventDate'   => '20-01-2019 15:00',
                'eventPlace'  => 'Paris'
            ],
            [
                'eventName'   => 'Meetup Symfony',
                'eventDate'   => '12-02-2019 9:00',
                'eventPlace'  => 'Canada'
            ],
            [
                'eventName'   => 'Laravel',
                'eventDate'   => '20-02-2019 10:00',
                'eventPlace'  => 'Senegal'
            ]
        ];

        return $this->render('event/index.html.twig', [
            'eventTab' => $eventTab
        ]);
    }
}
