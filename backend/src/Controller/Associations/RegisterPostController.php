<?php


namespace App\Controller\Associations;


use App\Association\Application\AssociationRegister;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Uid\Uuid;

class RegisterPostController extends AbstractController
{
    public function __construct(private AssociationRegister $associationRegister)
    {
    }

    #[Route('/associations', name: '_association_register', methods: ['POST'])]
    public function __invoke(Request $request): JsonResponse
    {
        $id = Uuid::v4()->toRfc4122();
        $data = $request->toArray();
        $this->associationRegister->__invoke(
             $id,
             $data['postalCode'],
             $data['description']
        );
        return new JsonResponse('ok', Response::HTTP_OK);

    }

}