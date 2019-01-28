<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MathildeController extends Controller
{
        public function number($name,$namefamily)
        {
        $number = random_int(0,100);
        
        
        return $this->render('mycv/number.html.twig',[
            'number' => $number,
            'name' => $name,
            'namefamily' => $namefamily,
            ]);
    }
}



