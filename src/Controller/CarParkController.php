<?php

namespace App\Controller;

use App\Entity\CarPark;
use App\Form\CarParkType;
use App\Service\SerializerService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CarParkController extends AbstractController
{
    public function fetchCarParks(Request $request, EntityManagerInterface $em, SerializerService $serializerService): Response
    {
        $carParks = $em->getRepository(CarPark::class)->findAll();

        $response = $serializerService->carParkSerialize($carParks);

        return new Response($response);
    }

    public function create(Request $request, EntityManagerInterface $em): Response
    {
        $carPark = new CarPark();
        $carPark->setTakenSpaces(0);
        $form = $this->createForm(CarParkType::class, $carPark);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($carPark);
            $em->flush();

            return $this->redirectToRoute('app_events');
        }

        return $this->render('carPark/create.html.twig', [
            'form' => $form,
        ]);
    }

}
