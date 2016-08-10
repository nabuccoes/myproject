<?php

namespace InmuebleBundle\Controller;

use InmuebleBundle\Entity\Inmueble;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class InmuebleController extends Controller
{
    public function getAllAction()
    {
        $inmuebles = $this->getDoctrine()
                        ->getRepository('InmuebleBundle:Inmueble')
                        ->findAll();

        return $this->render('InmuebleBundle:Default:list.html.twig', ['inmueble' => $inmuebles]);
    }

    public function getByIdAction($id)
    {
        $inmueble = $this->getDoctrine()->getRepository("InmuebleBundle:Inmueble")->findOneById($id);

        return new Response($inmueble->getName());
    }
}
