<?php

namespace App\Controller\CommunityTypes;

use App\CommunityType\Application\Register\RegisterCommunityTypeCommand;
use App\Shared\Domain\Bus\Command\CommandBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegisterPostController extends AbstractController
{
    public function __construct(private readonly CommandBus $commandBus)
    {
    }

    #[Route('/community_types', name: '_community_types', methods: ['POST'])]
    public function __invoke(Request $request): JsonResponse
    {
        $data = $request->toArray();
        
        $this->commandBus->dispatch(
            new RegisterCommunityTypeCommand(
                $data['id'],
                $data['name']
            )
        );

        return new JsonResponse('ok', Response::HTTP_OK);
    }
}