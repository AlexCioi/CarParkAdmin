<?php

namespace App\Controller;

use App\Entity\Event;
use App\Service\EventManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PostRequestController extends AbstractController
{
    public function receiveEvent(Request $request, EventManager $eventManager): Response
    {
        $eventManager->eventProcess($request);

        return new Response($request->getContent());
    }
}
