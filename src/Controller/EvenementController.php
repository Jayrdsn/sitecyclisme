<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Entity\User;
use App\Entity\Adresse;
use App\Entity\Participation;
use App\Form\EvenementType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/evenement")
 */
class EvenementController extends AbstractController
{
    /**
     * @Route("/", name="evenement_index", methods={"GET"})
     */
    public function index(): Response
    {

             if (empty($this->getUser()))
             {
                 return $this->redirectToRoute('app_login');

             }
        $evenements = $this->getDoctrine()
        ->getRepository(Evenement::class)
        ->findAll();
        $participations = $this->getDoctrine()

            ->getRepository(Participation::class)
            ->findAll();

        return $this->render('evenement/index.html.twig', [
            'evenements' => $evenements, 'participations' => $participations
        ]);
    }

    /**
     * @Route("/new", name="evenement_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $evenement = new Evenement();
        $form = $this->createForm(EvenementType::class, $evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            dump( $evenement);
        $adresse = new Adresse();
        $adresse->setNrue($evenement->getAdresse()->getNrue());
        $adresse->setRue($evenement->getAdresse()->getRue());
        $adresse->setCodepostal($evenement->getAdresse()->getCodepostal());
        $adresse->setVille($evenement->getAdresse()->getVille());
        $entityManager->persist($adresse);
        
        $evenement->setAdresse($adresse);
        $entityManager->persist($evenement);
            $entityManager->flush();
        

        

         return $this->redirectToRoute('evenement_index');
        }

        return $this->render('evenement/new.html.twig', [
            'evenement' => $evenement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="evenement_show", methods={"GET"})
     */
    public function show(Evenement $evenement): Response
    {

        $participations = $this->getDoctrine()
            ->getRepository(Participation::class)
            ->findBy(['idEvenement'=>$evenement->getId()]);
        return $this->render('evenement/show.html.twig', [
            'evenement' => $evenement, 'participations' => $participations,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="evenement_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Evenement $evenement): Response
    {
        $form = $this->createForm(EvenementType::class, $evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('evenement_index');
        }

        return $this->render('evenement/edit.html.twig', [
            'evenement' => $evenement,
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/{id}/participer", name="evenement_participer", methods={"GET","POST"})
     */
    public function participer(Request $request, Evenement $evenement): Response
    {
        $participer=new Participation();
        $participer->setIdUser($this->getUser());
        $participer->setIdEvenement($evenement);
        $entityManager = $this->getDoctrine()->getManager();
        dump( $participer);
        try {
        $entityManager->persist($participer);
        $entityManager->flush();
        } catch (\Exception $e) {
            dump($e->getMessage());
            return $this->redirectToRoute('evenement_index' , array("erreur"=>$e->getMessage()));
            throw $e;
        }
        return $this->redirectToRoute('evenement_index');




    }
    /**
     * @Route("/{id}", name="evenement_delete", methods={"GET","POST"})
     */
    public function delete(Request $request, Evenement $evenement): Response
    {
        if ($this->isCsrfTokenValid('delete'.$evenement->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($evenement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('evenement_index');
    }


    /**
     * @Route("/{id}/deleteP", name="parti_delete", methods={"POST"})
     */
    public function deletep (Request $request, Evenement $evenement) :Response
    {
        $participation =$this->getDoctrine()
            ->getRepository(Participation::class)
            ->findOneBy(["idEvenement"=>$evenement->getId(),"idUser"=>$this->getUser()]);
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->remove($participation);
                $entityManager->flush();

          //return $this->redirectToRoute('evenement_index');
        return $this->json(['success' => true]);
    }
}
