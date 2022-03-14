<?php

namespace App\Controller;

use App\Entity\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClientController extends AbstractController
{
    #[Route('/{reactRouting}', name:'home', defaults:['reactRouting'=> null])]
    public function index(): Response
    {
        return $this->render('client/index.html.twig');
    }
}
