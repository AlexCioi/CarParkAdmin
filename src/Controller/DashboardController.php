<?php

namespace App\Controller;

use App\Form\EventFilterType;
use App\Service\EventManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DashboardController extends AbstractController
{
    public function index(Request $request, EventManager $eventManager): Response
    {
        $events = $eventManager->getAllEvents();

        $form = $this->createForm(EventFilterType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid() ) {
            $startEndDate = $form->getData();
        }

        return $this->render('dashboard/index.html.twig', [
            'events' => $events,
            'form' => $form
        ]);
    }
}
