<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FakeController extends AbstractController
{

    #[Route('/fake', methods: ['GET'])]
    public function fake(): JsonResponse
    {
        return new JsonResponse(["data" => 'response from backend'], Response::HTTP_OK);
    }

}