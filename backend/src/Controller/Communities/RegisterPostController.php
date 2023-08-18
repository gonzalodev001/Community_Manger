<?php


namespace App\Controller\Communities;


use App\Community\Application\Register\RegisterCommunityCommand;
use App\Shared\Domain\Bus\Command\CommandBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegisterPostController extends AbstractController
{

    public function __construct(private CommandBus $commandBus)
    {
    }

    #[Route('/communities', name: '_community_register', methods: ['POST'])]
    public function __invoke(Request $request): JsonResponse
    {
        $data = $request->toArray();
        
        $this->commandBus->dispatch(
            new RegisterCommunityCommand(
                $data['id'],
                $data['address'],
                $data['municipality'],
                $data['communityTypeId'],
                $data['associationId'],
                $data["cif"]
            )
        );

        return new JsonResponse('ok', Response::HTTP_OK);
    }
}