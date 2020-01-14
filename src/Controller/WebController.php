<?php

namespace App\Controller;

use App\Repository\MusiqueRepository;
use App\Repository\ArtisteRepository;
use App\Repository\AlbumRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class WebController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(MusiqueRepository $musiqueRepository,ArtisteRepository $artisteRepository,AlbumRepository $albumRepository)
    {
        return $this->render('web/index.html.twig',[
            'current' => 'index', // navbar
            'musiques' => $musiqueRepository->findAll(),
            'artistes' => $artisteRepository->findAll(),
            'albums' => $albumRepository->findAll(),
            ]);
    }

    /**
     * @Route("/crud", name="crud")
     */
    public function page_crud()
    {
        return $this->render('web/crud.html.twig', ['current' => 'crud']);
    }
}
