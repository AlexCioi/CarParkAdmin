<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class EventController extends AbstractController
{
    public function receive(string $accessToken, ParameterBagInterface $params): Response
    {
        if ($accessToken != $params->get('app.event_access_token')) {
            dd($params->get('app.event_access_token'));
        }

        return $this->render('event/index.html.twig', [
            'controller_name' => 'EventController',
        ]);
    }
}
