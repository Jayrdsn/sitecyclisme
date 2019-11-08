<?php

namespace App\Controller;

use App\Entity\Nivdisci;
use App\Form\NivdisciType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/nivdisci")
 */
class NivdisciController extends AbstractController
{
    /**
     * @Route("/", name="nivdisci_index", methods={"GET"})
     */
    public function index(): Response
    {
        $nivdiscis = $this->getDoctrine()
            ->getRepository(Nivdisci::class)
            ->findAll();

        return $this->render('nivdisci/index.html.twig', [
            'nivdiscis' => $nivdiscis,
        ]);
    }

    /**
     * @Route("/new", name="nivdisci_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $nivdisci = new Nivdisci();
        $form = $this->createForm(NivdisciType::class, $nivdisci);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($nivdisci);
            $entityManager->flush();

            return $this->redirectToRoute('nivdisci_index');
        }

        return $this->render('nivdisci/new.html.twig', [
            'nivdisci' => $nivdisci,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="nivdisci_show", methods={"GET"})
     */
    public function show(Nivdisci $nivdisci): Response
    {
        return $this->render('nivdisci/show.html.twig', [
            'nivdisci' => $nivdisci,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="nivdisci_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Nivdisci $nivdisci): Response
    {
        $form = $this->createForm(NivdisciType::class, $nivdisci);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('nivdisci_index');
        }

        return $this->render('nivdisci/edit.html.twig', [
            'nivdisci' => $nivdisci,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="nivdisci_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Nivdisci $nivdisci): Response
    {
        if ($this->isCsrfTokenValid('delete'.$nivdisci->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($nivdisci);
            $entityManager->flush();
        }

        return $this->redirectToRoute('nivdisci_index');
    }
}
