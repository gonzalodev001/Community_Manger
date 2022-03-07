<?php


namespace App\Controller\Communities;


use App\Community\Application\CommunityRegister;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Uid\Uuid;

class RegisterPostController extends AbstractController
{

    public function __construct(private CommunityRegister $communityRegister)
    {
    }

    #[Route('/communities', name: '_community_register', methods: ['POST'])]
    public function __invoke(Request $request): JsonResponse
    {
        $id = Uuid::v4()->toRfc4122();
        $data = $request->toArray();
        $this->communityRegister->__invoke(
            $id,
            $data['address'],
            $data['municipality'],
            $data['communityTypeId'],
            $data['associationId']
        );

        return new JsonResponse('ok', Response::HTTP_OK);
    }
}