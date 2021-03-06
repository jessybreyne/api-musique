<?php

namespace App\Controller;

use App\Entity\Musique;
use App\Form\MusiqueType;
use App\Repository\MusiqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @Route("/musique")
 */
class MusiqueController extends AbstractController
{
    /**
     * @Route("/", name="musique_index", methods={"GET"})
     * @IsGranted("ROLE_USER")
     */
    public function index(MusiqueRepository $musiqueRepository): Response
    {
        return $this->render('musique/index.html.twig', [
            'musiques' => $musiqueRepository->findAll(),
            'crudcurrent' => 'musique',
            'current' => 'crud'
        ]);
    }

    /**
     * @Route("/new", name="musique_new", methods={"GET","POST"})
     * @IsGranted("ROLE_USER")
     */
    public function new(Request $request): Response
    {
        $musique = new Musique();
        $form = $this->createForm(MusiqueType::class, $musique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($musique);
            $entityManager->flush();

            return $this->redirectToRoute('musique_index');
        }

        return $this->render('musique/new.html.twig', [
            'musique' => $musique,
            'form' => $form->createView(),
            'crudcurrent' => 'musique',
            'current' => 'crud'
        ]);
    }

    /**
     * @Route("/{id}", name="musique_show", methods={"GET"})
     */
    public function show(Musique $musique): Response
    {
        return $this->render('musique/show.html.twig', [
            'musique' => $musique,
            'crudcurrent' => 'musique',
            'current' => 'crud'
        ]);
    }

    /**
     * @Route("/{id}/edit", name="musique_edit", methods={"GET","POST"})
     * @IsGranted("ROLE_USER")
     */
    public function edit(Request $request, Musique $musique): Response
    {
        $form = $this->createForm(MusiqueType::class, $musique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('musique_index');
        }

        return $this->render('musique/edit.html.twig', [
            'musique' => $musique,
            'form' => $form->createView(),
            'crudcurrent' => 'musique',
            'current' => 'crud'
        ]);
    }

    /**
     * @Route("/{id}", name="musique_delete", methods={"DELETE"})
     * @IsGranted("ROLE_USER")
     */
    public function delete(Request $request, Musique $musique): Response
    {
        if ($this->isCsrfTokenValid('delete'.$musique->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($musique);
            $entityManager->flush();
        }

        return $this->redirectToRoute('musique_index');
    }
}
