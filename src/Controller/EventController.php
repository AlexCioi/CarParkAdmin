<?php

namespace App\Controller;

use App\Entity\Event;
use App\Form\EventFilterType;
use App\Service\EventManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class EventController extends AbstractController
{
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $events = $entityManager->getRepository(Event::class)->findAll();

        $form = $this->createForm(EventFilterType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid() ) {
            $startEndDate = $form->getData();
        }

        return $this->render('event/index.html.twig', [
            'events' => $events,
            'form' => $form
        ]);
    }

    public function receiveEvent(Request $request, EventManager $eventManager): Response
    {
        $eventManager->eventProcess($request);

        return new Response($request->getContent());
    }
}
