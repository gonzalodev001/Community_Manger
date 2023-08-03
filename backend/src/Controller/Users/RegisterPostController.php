<?php


namespace App\Controller\Users;

use App\Shared\Domain\Bus\Command\CommandBus;
use App\User\Application\Register\RegisterUserCommand;
use App\Person\Application\Register\RegisterPersonCommand;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegisterPostController
{
    //, private UserRegisteredDomainEvent $event
    public function __construct(private readonly CommandBus $commandBus)
    {
    }

    #[Route('/users', name: '_user_register', methods: ['POST'])]
    public function __invoke(Request $request): JsonResponse
    {
        $data = $request->toArray();
        //dd($data['user']["id"], $data['person']['id']);
        $this->commandBus->dispatch(
            new RegisterUserCommand(
                $data['user']['id'],
                $data['user']['email'],
                $data['user']['password'],
                $data['user']['confirmPassword'],
                $data['user']['communityId']
            )
        );
 
        $this->commandBus->dispatch(
            new RegisterPersonCommand(
                $data['user']['id'],
                $data['person']['firstName'],
                $data['person']['lastName'],
                $data['person']['document'],
                $data['person']['phone']
            )
        );

        return new JsonResponse('ok', Response::HTTP_OK);
    }
}