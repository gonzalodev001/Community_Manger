<?php


namespace App\Controller\Users;


use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Cookie;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use App\User\Domain\Repository;
use App\User\Application\UserLogin;
use Symfony\Component\Security\Core\Encoder\UserPasswordHasherInterface;

class LoginPutController
{
    public function __construct(private JWTTokenManagerInterface $tokenManager, private UserLogin $userLogin, private UserPasswordHasherInterface $passwordHasher) {}

    #[Route('/login_check', name:'_user_login', methods:['POST'])]
    public function __invoke(Request $request)
    {
        // TODO: Implement __invoke() method.
        $data = $request->toArray();
        $userName = $data['username'];
        $password = $data['password'];
        $user = $this->userLogin->__invoke($userName, $password);

        if(!$user || !$this->passwordHasher->isPasswordValid($user, $password)) {
            return new Response('Bad credentials', 401);
        }
        $token = $this->tokenManager->create($user);
        $response = new Response();
        $response->headers->clearCookie('XSRF-TOKEN');
        $response->headers->clearCookie('XSRF-TOKEN');
        $response->headers->setCookie(Cookie::create('XSRF-TOKEN', $token));
        return $response;
    }

}