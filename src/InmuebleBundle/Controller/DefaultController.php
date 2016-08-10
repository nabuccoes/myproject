<?php

namespace InmuebleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('InmuebleBundle:Default:index.html.twig');
    }

    public function showAction($slug)
    {
        return new Response("Muestro el inmueble <b>" . $slug . "</b>");
    }
}
