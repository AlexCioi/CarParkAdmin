<?php

namespace App\Controller;

use App\Form\EventFilterType;
use App\Service\EventManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DashboardController extends AbstractController
{
    public function index(): Response
    {

        return $this->render('dashboard/index.html.twig');
    }
}
