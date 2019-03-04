<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Loisirs;
use App\Form\LoisirsType;

class LoisirsController extends Controller
{
    public function create()
    {
        $loisirs = new Loisirs();
        $form = $this->createForm(LoisirsType::class, $loisirs);

        return $this->render('loisirs/create.html.twig', [
            'entity' => $loisirs,
            'form' => $form->createView(),
            ]
        );
    }

    public function edit($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $loisirs = $entityManager->getRepository(Loisirs::class)->findOneBy(['id' => $id]);
        if ($loisirs) {
            $form = $this->createForm(LoisirsType::class, $loisirs);

            return $this->render('loisirs/create.html.twig', [
            'entity' => $loisirs,
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
        $loisirs = $eManager->getRepository(Loisirs::class)->FindOneBy(['id' => $id]);
        $eManager->remove($loisirs);
        $eManager->flush();

        return $this->redirectToRoute('app_lucky_number');
    }

    public function valid(Request $request)
    {
        $loisirs = new Loisirs();
        $form = $this->createForm(LoisirsType::class, $loisirs);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $loisirs = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($loisirs);
            $entityManager->flush();

            return $this->redirectToRoute('app_lucky_number');
        }

        return $this->render('loisirs/create.html.twig', [
            'entity' => $loisirs,
            'form' => $form->createView(),
            ]
        );
    }
}
