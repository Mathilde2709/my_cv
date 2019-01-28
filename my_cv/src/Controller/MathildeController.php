<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MathildeController extends Controller
{
    public function number()
    {
        $number = random_int(0,100);
        
        return $this->render('mycv/number.html.twig', array(
            'number' => $number,
            ));
    }
}

