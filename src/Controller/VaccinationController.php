<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Repository\PatientRepository;
use App\Form\PatientType;
use App\Entity\CentreVaccination;
use App\Repository\CentreVaccinationRepository;
use App\Form\CentreVaccinationType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


use App\Entity\Vaccination;
use App\Form\VaccinationType;
use App\Repository\VaccinationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/vaccination")
 */
class VaccinationController extends AbstractController
{
    /**
     * @Route("/", name="vaccination_index", methods={"GET"})
     */
    public function index(VaccinationRepository $vaccinationRepository): Response
    {
        return $this->render('vaccination/index.html.twig', [
            'vaccinations' => $vaccinationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="vaccination_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $vaccination = new Vaccination();
        $form = $this->createForm(VaccinationType::class, $vaccination);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($vaccination);
            $entityManager->flush();

            return $this->redirectToRoute('vaccination_index');
        }

        return $this->render('vaccination/new.html.twig', [
            'vaccination' => $vaccination,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="vaccination_show", methods={"GET"})
     */
    public function show(Vaccination $vaccination): Response
    {
        return $this->render('vaccination/show.html.twig', [
            'vaccination' => $vaccination,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="vaccination_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Vaccination $vaccination): Response
    {
        $form = $this->createForm(VaccinationType::class, $vaccination);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vaccination_index');
        }

        return $this->render('vaccination/edit.html.twig', [
            'vaccination' => $vaccination,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="vaccination_delete", methods={"POST"})
     */
    public function delete(Request $request, Vaccination $vaccination): Response
    {
        if ($this->isCsrfTokenValid('delete'.$vaccination->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($vaccination);
            $entityManager->flush();
        }

        return $this->redirectToRoute('vaccination_index');
    }

        /**
     * @Route("/{id}/newPatientVacc", name="vaccination_new_patient", methods={"GET","POST"})
     */

    public function newPatientVacc(Request $request, Patient $patient): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $vaccination = new Vaccination();
        $form = $this->createForm(VaccinationType::class, $vaccination);
        //$p= $entityManager->find('App\Entity\Patient','id');

        $vaccination->setPatient($patient);
        $form->get('patient')->setData($vaccination->getPatient());
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($vaccination);
            $entityManager->flush();

            return $this->redirectToRoute('vaccination_index');
        }

        return $this->render('vaccination/new.html.twig', [
            'vaccination' => $vaccination,
            'form' => $form->createView(),
        ]);
    }

     /**
     * @Route("/{id}/PatientVaccinations", name="patient_vaccinations", methods={"GET","POST"})
     */

    public function PatientVacc(Request $request,VaccinationRepository $vaccinationRepository, Patient $patient): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $vaccination = new Vaccination();
        $form = $this->createForm(VaccinationType::class, $vaccination);
        //$p= $entityManager->find('App\Entity\Patient','id');

        $vaccination->setPatient($patient);
        $form->get('patient')->setData($vaccination->getPatient());
        $form->handleRequest($request);

        return $this->render('vaccination/index.html.twig', [
            'vaccinations' => $patient->getVaccinations(),
        ]);
    }

    /**
     * @Route("/{id}/CentreVaccinations", name="centre_vaccinations", methods={"GET","POST"})
     */

    public function centreVacc(Request $request,VaccinationRepository $vaccinationRepository, CentreVaccination $centreVaccination): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $vaccination = new Vaccination();
        $form = $this->createForm(VaccinationType::class, $vaccination);
        $vaccination->setCentreVaccination($centreVaccination);
        $form->get('centreVaccination')->setData($vaccination->getCentreVaccination());
        $form->handleRequest($request);

        return $this->render('vaccination/index.html.twig', [
            'vaccinations' => $centreVaccination->getVaccinations(),
        ]);
    }
}
