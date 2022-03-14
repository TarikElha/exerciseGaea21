<?php

namespace App\Controller;

use App\Entity\Client;
use App\Repository\ClientRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/api', name: 'api_')]
class ApiController extends AbstractController
{
    #[Route('/tab', name: 'index', methods:'GET')]
    public function getClients(ClientRepository $clientRepository, SerializerInterface $serializer)
    {
        $clients = $clientRepository->findAll();
        $jsonContent = $serializer->serialize($clients, 'json', ['groups' => 'client']);

        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->setContent(json_encode($jsonContent));
        
        return $response;
    }

    //fonction qui affiche un client
    #[Route('/client/{id}', name: 'show', methods:'get')]
    public function getOneClient(Client $client, SerializerInterface $serializer): Response
    {
        $jsonContent = $serializer->serialize($client, 'json', ['groups' => 'client']);

        $response = new Response();

        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');

        $response->setContent(json_encode($jsonContent));
        
        return $response;
    }

    //fonction qui supprime un client par son id
    #[Route('/delete/{id}', name: 'delete', methods:'delete')]
    public function deleteOneClient(Client $client, SerializerInterface $serializer, EntityManagerInterface $em): Response
    {
        $em->remove($client);
        $em->flush();

        $response = new Response();
        $response->setStatusCode(200);

        return $response;
    }
}