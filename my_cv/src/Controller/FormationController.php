<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Formation;
use App\Form\FormationType;

class FormationController extends Controller
{
    public function create()
    {
        $formation = new Formation();
        $form = $this->createForm(FormationType::class, $formation);

        return $this->render('formation/create.html.twig', [
            'entity' => $formation,
            'form' => $form->createView(),
            ]
        );
    }

    public function edit($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $formation = $entityManager->getRepository(Formation::class)->findOneBy(['id' => $id]);
        if ($formation) {
            $form = $this->createForm(FormationType::class, $formation);

            return $this->render('formation/create.html.twig', [
            'entity' => $formation,
            'form' => $form->createView(),
            ]
          );
        } else {
            return new Response(
            '<html><body>Pas d\'ID </body></html>'
        );
        }
    }

    public function remove($id)
    {
        $eManager = $this->getDoctrine()->getManager();
        $formation = $eManager->getRepository(Formation::class)->FindOneBy(['id' => $id]);
        $eManager->remove($formation);
        $eManager->flush();

        return $this->redirectToRoute('app_lucky_number');
    }

    public function valid(Request $request)
    {
        $formation = new Loisirs();
        $form = $this->createForm(FormationType::class, $formation);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formation = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($formation);
            $entityManager->flush();

            return $this->redirectToRoute('app_lucky_number');
        }

        return $this->render('formation/create.html.twig', [
            'entity' => $formation,
            'form' => $form->createView(),
            ]
        );
    }
}
