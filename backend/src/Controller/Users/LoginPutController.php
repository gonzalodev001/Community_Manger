<?php


namespace App\Controller\Users;


use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Cookie;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use App\User\Domain\Repository;
use App\User\Application\UserLogin;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\User\Infrastructure\Framework\Entity\SymfonyUser;
//use Symfony\Component\Security\Core\Encoder\UserPasswordHasherInterface;

class LoginPutController
{
    public function __construct(private JWTTokenManagerInterface $tokenManager, private UserLogin $userLogin) {}

    #[Route('/login_check', name:'_user_login', methods:['POST'])]
    public function __invoke(Request $request): Response
    {
        $data = $request->toArray();
        $userName = $data['username'] ?? '';
        $password = $data['password'] ?? '';
        $user = $this->userLogin->__invoke($userName, $password);

        if(!$user) {
            return new JsonResponse([
                'OK' => false, 
                'data'=>[], 
                'message' =>'Invalid credentials', 
                'code' => 401, 
                'errors' => []
            ], 401);//JsonResponse::HTTP_UNAUTHORIZED
        }
        //Creamos un symfonyUser porque extiende de UserInterface que necesita para el tokenManager como typeHint UserInterface
        $user = new SymfonyUser(
            $user->id()->value(), 
            $user->email()->email(), 
            $user->password()->password(), 
            $user->roles(),
            $user->getCreatedAt(),
            $user->getUpdatedAt(),
            $user->communityId()->value()
        );
        $token = $this->tokenManager->create($user);
        $response = new JsonResponse();
        $response->headers->clearCookie('XSRF-TOKEN');
        $response->headers->clearCookie('XSRF-TOKEN');
        $response->headers->setCookie(Cookie::create('XSRF-TOKEN', $token));
        return $response;
    }

}