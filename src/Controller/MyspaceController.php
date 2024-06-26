<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MyspaceController extends AbstractController
{
    #[Route('/profile/myspace', name: 'app_myspace')]
    public function index(): Response
    {
        $userName = ucfirst($this->getUser()->getName());
        $userFirstname = ucfirst($this->getUser()->getFisrtname());
        $userEmail = $this->getUser()->getEmail();
        $userEmailVerifier = $this->getUser()->isVerified();
        $userInvoice = $this->getUser()->getBill();

        return $this->render('myspace/index.html.twig', [
            "name" => $userName,
            "fisrtname" => $userFirstname,
            "email" => $userEmail,
            "verified" => $userEmailVerifier,
            "invoices" => $userInvoice
        ]);
    }
}
