<?php


namespace App\Controller\Users;


use App\Person\Application\RegisterPersonUseCase;
use App\User\Application\RegisterUser;
use mysql_xdevapi\Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Uid\Uuid;

class RegisterPostController extends AbstractController
{

    public function __construct(private RegisterUser $registerUser, private RegisterPersonUseCase $registerPersonUseCase)
    {
    }

    #[Route('/users', name: '_user_register', methods: ['POST'])]
    public function __invoke(Request $request): JsonResponse
    {
        $id = Uuid::v4()->toRfc4122();
        $data = $request->toArray();
        //dd($data['user']["email"], $data['person']['firstName']);
        //dd($data);
        $userId = $this->registerUser->__invoke(
            $id,
            $data['user']['email'],
            $data['user']['password'],
            $data['user']['confirmPassword'],
            $data['user']['communityId']
        );

        $personId = Uuid::v4()->toRfc4122();
        $this->registerPersonUseCase->__invoke(
            $personId,
            $data['person']['firstName'],
            $data['person']['lastName'],
            $data['person']['document'],
            $data['person']['phone'],
            $userId
        );

        return new JsonResponse('ok', Response::HTTP_OK);
    }
}