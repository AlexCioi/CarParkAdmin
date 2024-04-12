<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class SerializerService
{
    public function __construct()
    {
    }


    public function carParkSerialize(array $carParks): string
    {

        $jsonEncoder = [new JsonEncoder()];
        $defaultContext = [
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER =>
                function ($object, string $format, array $context): string {
                    return $object->getId();
                }
        ];

        $normalizer = [new ObjectNormalizer(null, null, null, null, null, null,
                                            $defaultContext)];

        $serializer = new Serializer($normalizer, $jsonEncoder);

        $response = $serializer->serialize($carParks, 'json');

        return $response;
    }
}
