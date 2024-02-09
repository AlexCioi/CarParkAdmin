<?php

namespace App\Controller;

use App\Entity\Event;
use App\Service\EventManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class EventController extends AbstractController
{
    public function receive(string $accessToken, Request $request, ParameterBagInterface $params, EventManager $eventManager): Response
    {
//        if ($accessToken != $params->get('app.event_access_token')) {
//            dd($request);
//        }

        $requestJson = '{
            "status": 1,
            "zone": 2,
            "eventType": 3,
            "dateTime": "2024-02-08T12:00:00+00:00",
            "description": "Sample event description"
        }';

        $eventManager->eventProcess($requestJson);

        return $this->render('event/index.html.twig', [
            'controller_name' => 'EventController',
        ]);
    }
}
