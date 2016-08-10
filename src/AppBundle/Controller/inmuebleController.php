<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class InmuebleController extends Controller
{
    public function indexAction()
    {
        return new Response('<html><body>Listado de inmuebles: !</body></html>');
    }
}