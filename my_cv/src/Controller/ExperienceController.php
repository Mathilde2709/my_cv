<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Experience;
use App\Form\ExperienceType;

class ExperienceController extends Controller
{
    public function create()
    {
        $experience = new Experience();
        $form = $this->createForm(ExperienceType::class, $experience);

        return $this->render('experience/create.html.twig', [
            'entity' => $experience,
            'form' => $form->createView(),
            ]
        );
    }

    public function edit($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $experience = $entityManager->getRepository(Experience::class)->findOneBy(['id' => $id]);
        if ($experience) {
            $form = $this->createForm(ExperienceType::class, $experience);

            return $this->render('experience/create.html.twig', [
                'entity' => $experience,
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
        $experience = $eManager->getRepository(Experience::class)->FindOneBy(['id' => $id]);
        $eManager->remove($experience);
        $eManager->flush();

        return $this->redirectToRoute('app_lucky_number');
    }

    public function valid(Request $request)
    {
        $experience = new Experience();
        $form = $this->createForm(ExperienceType::class, $experience);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $experience = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($experience);
            $entityManager->flush();

            return $this->redirectToRoute('app_lucky_number');
        }

        return $this->render('experience/create.html.twig', [
            'entity' => $experience,
            'form' => $form->createView(),
            ]
        );
    }
}
