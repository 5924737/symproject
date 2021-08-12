<?php

namespace App\Controller;

use App\Models\GreetingGenerator;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    /**
     * @Route("/")
    */
    public function index()
    {
        return new Response('Hello!');
    }

    /**
     * @Route("/hello/{name}")
     */
    public function ind($name)
    {
        return new Response("Hello! $name");
    }

    /**
     * @Route("/main/{name}")
     */
    public function main($name, LoggerInterface $logger)
    {
        $logger->info("Saying hello to $name!");
        return $this->render('default/index.html.twig', ['name' => $name]);
    }

    /**
     * @Route("/api/hello/{name}")
     */
    public function apiExample($name)
    {
        return $this->json([
            'name' => $name,
            'symfony' => 'rocks',
        ]);
    }

    /**
    * @Route("/hello1/{name}")
    */
    public function iex($name, LoggerInterface $logger, GreetingGenerator $generator)
    {
        $greeting = $generator->getRandomGreeting();

        $logger->info("Saying $greeting to $name!");

        return $this->render('default/index.html.twig', ['name' => "Saying $greeting to $name!"]);
    }
}