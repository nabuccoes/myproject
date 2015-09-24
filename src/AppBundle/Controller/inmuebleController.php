<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class inmuebleController extends Controller
{
    /**
     * @Route("/Inmueble/number")
     */
    public function showAction($inmueble_Id)
    {
        return new Response(
            '<html><body>Inmueble number: '.$inmueble_Id.'</body></html>'
        );
    }
}