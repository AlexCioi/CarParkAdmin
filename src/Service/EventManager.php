<?php

namespace App\Service;

use App\Entity\Event;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Psr\Log\LoggerInterface;

class EventManager
{

    public function __construct(
        private EntityManagerInterface $entityManager,
        private ManagerRegistry $doctrine,
    ){
    }

    public function eventProcess(string $requestJson): void
    {
        $requestObject = json_decode($requestJson);
        $event = new Event();

        //dd($requestObject);

        $event->setStatus($requestObject->status);
        $event->setZone($requestObject->zone);
        $event->setEventType($requestObject->eventType);
        $event->setDateTime(new \DateTime($requestObject->dateTime));
        $event->setDescription($requestObject->description);

//        dd($event);

        $this->entityManager->persist($event);
        $this->entityManager->flush();
    }

    public function getAllEvents(): ?array
    {
        $repo = $this->doctrine->getRepository(Event::class);
        $qb = $repo->getQb();

        $repo->getAllEvents($qb);

        return $qb->getQuery()->getResult();
    }
}