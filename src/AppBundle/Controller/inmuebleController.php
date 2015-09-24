<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class InmuebleController extends Controller
{
    /**
     * @Route("/inmueble/number")
     */
    public function indexAction($number)
    {
        return new Response('<html><body>Inmueble número: '.$number.'!</body></html>');
    }
}