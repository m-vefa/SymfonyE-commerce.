<?php

namespace App\Controller;

use App\Repository\Admin\CategoryRepository;
use App\Repository\Admin\SettningRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(CategoryRepository$categoryrepository, SettningRepository $settningrepository ,AuthenticationUtils $authenticationUtils): Response
    {
        //if ($this->getUser()) {
          //  $this->redirectToRoute('home');
       //  }
        $catlist=$categoryrepository->findby(['parent_id'=>0]);


        $data= $settningrepository->findAll();

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();


        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
            'data' => $data,

        'catlist' => $catlist,
        ]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \Exception('This method can be blank - it will be intercepted by the logout key on your firewall');
    }
}
