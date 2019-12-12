<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class WebController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render('web/index.html.twig');
    }

    /**
     * @Route("/crud", name="crud")
     */
    public function page_crud()
    {
        return $this->render('web/crud.html.twig');
    }
}
