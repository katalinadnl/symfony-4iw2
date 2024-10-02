<?php

declare(strict_types=1);

namespace App\Controller\Auth;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthController extends AbstractController
{
    #[Route(path: '/login', name: 'login')]
    public function login(): Response
    {
        return $this->render('auth/login.html.twig');
    }

    #[Route(path: '/register', name: 'register')]
    public function register(): Response
    {
        return $this->render('auth/register.html.twig');
    }

    #[Route(path: '/confirm', name: 'confirm')]
    public function confirm(): Response
    {
        return $this->render('auth/confirm.html.twig');
    }

    #[Route(path: '/forgot-password', name: 'forgot_password')]
    public function forgotPassword(): Response
    {
        return $this->render('auth/forgot-password.html.twig');
    }

    #[Route(path: '/reset-password', name: 'reset_password')]
    public function resetPassword(): Response
    {
        return $this->render('auth/reset-password.html.twig');
    }
}
