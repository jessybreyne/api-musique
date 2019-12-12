<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/api", name="api_generator")
     */

    public function apiGenerator()
    {
        $user = $this->getUser();
        if ($user!=null)
            return $this->render('security/api.html.twig');
        else
            return $this->redirectToRoute('app_login');
    }

    /**
     * @Route("/getAPI", name="getAPIKey")
     */
    public function getAPI()
    {
        $user = $this->getUser();
        if ($user){
            $entityManager = $this->getDoctrine()->getManager();
            $apiKey = $user->generateAPIKey();
            $user->setAPIKey($apiKey);
            $entityManager->flush();
            return $this->json([
                'codeStatus' => 00001,
                'messageStatus' => "Clé d'API généré",
                'APIKey' => $apiKey,
            ]);
        }
        else{
            return $this->json([
                'codeStatus' => 00101,
                'messageStatus' => "Clé d'API non généré",
                'APIKey' => '',
            ]);
        }
    }


    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \Exception('This method can be blank - it will be intercepted by the logout key on your firewall');
    }
}
