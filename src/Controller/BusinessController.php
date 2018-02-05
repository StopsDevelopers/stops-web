<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class BusinessController extends Controller
{
    public function index()
    {
        // replace this line with your own code!
        return $this->render('business.html.twig');
    }

    public function register($number){
        switch ($number){
            case 1:
                return $this->render('business-step-one.html.twig');
                break;
            case 2:
                return $this->render('business-step-two.html.twig');
                break;
            case 3:
                return $this->render('business-step-three.html.twig');
                break;
        }
    }
}
