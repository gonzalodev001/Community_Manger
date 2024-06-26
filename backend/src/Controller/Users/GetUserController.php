<?php

namespace App\Controller\Users;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\Security;

class GetUserController
{
    public function __construct(private Security $security) {}

    #[Route('/users', name:'_user_get', methods:['GET'])]
    public function __invoke(Request $request): Response
    {
        $user = $this->security->getUser();
        if(!$user) {
            return new JsonResponse([
                'OK' => false, 
                'data'=>[], 
                'message' =>'User not found', 
                'code' => 404, 
                'errors' => []
            ], 404);
        }
        
        return new JsonResponse([
            'OK' => true, 
            'data'=> [
                'user' => [
                    'id' => $user->getId(),
                    'email' => $user->getEmail(),
                    'roles' => $user->getRoles(),
                    'communityId' => $user->getCommunityId(),
                    'createdAt' => $user->getCreatedAt(),
                    'updatedAt' => $user->getUpdatedAt(),
                ]
            ], 
            'message' =>'User found', 
            'code' => 200, 
            'errors' => []
        ], 200);
    }
}