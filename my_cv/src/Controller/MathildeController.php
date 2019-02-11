<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Formation;
use App\Entity\Experience;
use App\Entity\Loisirs;

class MathildeController extends Controller
{
        public function number()
        {
        $number = random_int(0,100);
        $formations = $this->getDoctrine()->getRepository(Formation::class)->findAll();
        $experiences = $this->getDoctrine()->getRepository(Experience::class)->findAll();
        $loisirs = $this->getDoctrine()->getRepository(Loisirs::class)->findAll();
        

        return $this->render('mycv/number.html.twig',[
            'number' => $number,
            'name' => 'Mathilde',
            'namefamily' => 'Meunier',
            'formations'=> $formations,
            'experiences'=>$experiences,
            'loisirs'=>$loisirs
            ]);
           
        }
        public function createformation()
        {
            $form = new Formation();
            $form->setName('Ma formation');
            $datedebut = \DateTime::createFromFormat("d/m/y","2/09/17");
            $datefin = \DateTime::createFromFormat("d/m/y", "26/06/19");
            $form->setDateDebut($datedebut);
            $form->setDateFin($datefin);
            $form->setLieu('Grenoble');
            $eManager=$this->getDoctrine()->getManager();
            $eManager->persist($form);
            $eManager->flush();
            
            return $this->redirectToRoute('app_lucky_number');
            
        }
        
        public function createexperience()
        {
            $form = new Experience();
            $form->setName('Mon experience');
            $form->setEntreprise('UGA');
            $datedebut = \DateTime::createFromFormat("d/m/y","3/09/17");
            $datefin = \DateTime::createFromFormat("d/m/y","31/09/17");
            $form->setDateDebut($datedebut);
            $form->setDateFin($datefin);
            $form->setLieu('Grenoble');
            $eManager=$this->getDoctrine()->getManager();
            $eManager->persist($form);
            $eManager->flush();
            
            return $this->redirectToRoute('app_lucky_number');
            //return $this->render('mycv/experiences.html.twig',
            //[]);
            
        }
        
        public function createloisirs()
        {
            $form = new Loisirs();
            $form->setName('la photographie');
            $form->setSubject('la photographie');
            $form->setCompetences('Esprit créatif et artistique');
            $eManager=$this->getDoctrine()->getManager();
            $eManager->persist($form);
            $eManager->flush();
            
            return $this->redirectToRoute('app_lucky_number');
        }

}



