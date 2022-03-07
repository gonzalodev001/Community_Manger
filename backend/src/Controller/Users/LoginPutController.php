<?php


namespace App\Controller\Users;


use Symfony\Component\Routing\Annotation\Route;

class LoginPutController
{
    #[Route('/login_check', name:'_user_login', methods:['POST'])]
    public function __invoke()
    {
        // TODO: Implement __invoke() method.
    }

}