<?php

namespace App\Controller;

use App\Entity\Nivcat;
use App\Form\NivcatType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/nivcat")
 */
class NivcatController extends AbstractController
{
    /**
     * @Route("/", name="nivcat_index", methods={"GET"})
     */
    public function index(): Response
    {
        $nivcats = $this->getDoctrine()
            ->getRepository(Nivcat::class)
            ->findAll();

        return $this->render('nivcat/index.html.twig', [
            'nivcats' => $nivcats,
        ]);
    }

    /**
     * @Route("/new", name="nivcat_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $nivcat = new Nivcat();
        $form = $this->createForm(NivcatType::class, $nivcat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($nivcat);
            $entityManager->flush();

            return $this->redirectToRoute('nivcat_index');
        }

        return $this->render('nivcat/new.html.twig', [
            'nivcat' => $nivcat,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="nivcat_show", methods={"GET"})
     */
    public function show(Nivcat $nivcat): Response
    {
        return $this->render('nivcat/show.html.twig', [
            'nivcat' => $nivcat,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="nivcat_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Nivcat $nivcat): Response
    {
        $form = $this->createForm(NivcatType::class, $nivcat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('nivcat_index');
        }

        return $this->render('nivcat/edit.html.twig', [
            'nivcat' => $nivcat,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="nivcat_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Nivcat $nivcat): Response
    {
        if ($this->isCsrfTokenValid('delete'.$nivcat->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($nivcat);
            $entityManager->flush();
        }

        return $this->redirectToRoute('nivcat_index');
    }
}
