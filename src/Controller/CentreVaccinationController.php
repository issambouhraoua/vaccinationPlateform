<?php

namespace App\Controller;

use App\Entity\CentreVaccination;
use App\Form\CentreVaccinationType;
use App\Repository\CentreVaccinationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


//("/centre/vaccination")

/**
 * @Route("/centreVaccination")
 */
class CentreVaccinationController extends AbstractController
{
    /**
     * @Route("/", name="centre_vaccination_index", methods={"GET"})
     */
    public function index(CentreVaccinationRepository $centreVaccinationRepository): Response
    {
        return $this->render('centre_vaccination/index.html.twig', [
            'centre_vaccinations' => $centreVaccinationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="centre_vaccination_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $centreVaccination = new CentreVaccination();
        $form = $this->createForm(CentreVaccinationType::class, $centreVaccination);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($centreVaccination);
            $entityManager->flush();

            return $this->redirectToRoute('centre_vaccination_index');
        }

        return $this->render('centre_vaccination/new.html.twig', [
            'centre_vaccination' => $centreVaccination,
            'form' => $form->createView(),
        ]);
    }


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
     * @Route("/{id}", name="centre_vaccination_show", methods={"GET"})
     */
    public function show(CentreVaccination $centreVaccination): Response
    {
        return $this->render('centre_vaccination/show.html.twig', [
            'centre_vaccination' => $centreVaccination,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="centre_vaccination_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CentreVaccination $centreVaccination): Response
    {
        $form = $this->createForm(CentreVaccinationType::class, $centreVaccination);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('centre_vaccination_index');
        }

        return $this->render('centre_vaccination/edit.html.twig', [
            'centre_vaccination' => $centreVaccination,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="centre_vaccination_delete", methods={"POST"})
     */
    public function delete(Request $request, CentreVaccination $centreVaccination): Response
    {
        if ($this->isCsrfTokenValid('delete'.$centreVaccination->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($centreVaccination);
            $entityManager->flush();
        }

        return $this->redirectToRoute('centre_vaccination_index');
    }


    
}
