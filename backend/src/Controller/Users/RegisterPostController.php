<?php


namespace App\Controller\Users;


use App\User\Application\RegisterUser;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Uid\Uuid;

class RegisterPostController extends AbstractController
{

    public function __construct(private RegisterUser $registerUser)
    {
    }

    #[Route('/users', name: '_user_register', methods: ['POST'])]
    public function __invoke(Request $request): JsonResponse
    {
        $id = Uuid::v4()->toRfc4122();
        $data = $request->toArray();
        $this->registerUser->__invoke(
            $id,
            $data['email'],
            $data['password'],
            $data['confirmPassword']
        );

        return new JsonResponse('ok', Response::HTTP_OK);
    }
}