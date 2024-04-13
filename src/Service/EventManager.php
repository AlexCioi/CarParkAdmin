<?php

namespace App\Service;

use App\Entity\CarPark;
use App\Entity\Event;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;

class EventManager
{

    public function __construct(
        private EntityManagerInterface $entityManager,
    ){
    }

    public function eventProcess(Request $request): void
    {
        $data = json_decode($request->getContent(), true);

        $event = new Event();
        $carPark = $this->entityManager->getRepository(CarPark::class)->findOneBy([
            'id' => $data['parkNumber']
        ]);

        $carPark->incrementTakenSpaces();
        $this->entityManager->persist($carPark);

        $event->setCarPark($carPark);
        $event->setDescription($data['description']);
        $event->setLicensePlate($data['licensePlate']);

        $dateString = $data['dateTime']['date'];
        $dateTime = new \DateTime($dateString);

        $event->setDateTime($dateTime);

        $this->entityManager->persist($event);
        $this->entityManager->flush();

        //        {
//            "status": 0,
//            "parkNumber": 3,
//            "dateTime": {
//                "date": "2024-03-23 18:32:52.000000",
//                "timezone_type": 3,
//                "timezone": "UTC"
//            },
//            "description": "irure laborum Duis"
//        }
    }
}
