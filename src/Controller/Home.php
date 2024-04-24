<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/', name: 'home')]
class Home
{
     public function __invoke(): Response
     {
          return new Response('Hello, world!');
     }
}
