<?php


namespace App\Controller\CommunityTypes;


use App\CommunityType\Application\CommunityTypeRegister;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Uid\Uuid;

class RegisterPostController extends AbstractController
{
    public function __construct(private CommunityTypeRegister $communityTypeRegister)
    {
    }

    #[Route('/community_types', name: '_community_types', methods: ['POST'])]
    public function __invoke(Request $request): JsonResponse
    {
        $id = Uuid::v4()->toRfc4122();
        $data = $request->toArray();

        $this->communityTypeRegister->__invoke($id, $data['name']);

        return new JsonResponse('ok', Response::HTTP_OK);
    }
}