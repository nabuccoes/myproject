<?php

namespace InmuebleBundle\Controller;

use InmuebleBundle\Entity\Inmueble;
use InmuebleBundle\Form\InmuebleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class InmuebleController extends Controller
{
    public function getAllAction()
    {
        $inmuebles = $this->getDoctrine()
            ->getRepository('InmuebleBundle:Inmueble')
            ->findAll();

        return $this->render('InmuebleBundle:Default:list.html.twig', ['inmuebles' => $inmuebles]);
    }

    public function getByIdAction($id)
    {
        $inmueble = $this->getDoctrine()->getRepository("InmuebleBundle:Inmueble")->findOneById($id);

        return new Response($inmueble->getName());
    }

    public function getByUserIdAction($userId)
    {
        return $this->render('InmuebleBundle:Default:list.html.twig', ['inmuebles' => $this->get('inmuebles.by_owner')->getInmuebleByOwnerId($userId)]);
    }

    public function getBySlugAction($slug)
    {
        $inmueble = $this->getDoctrine()->getRepository("InmuebleBundle:Inmueble")->findOneBySlug($slug);

        return new Response($inmueble->getName());
    }

    public function addAction()
    {
        $inmueble     = new Inmueble();
        $inmuebleForm = new InmuebleType();
        $form       = $this->createForm($inmuebleForm, $inmueble, [
            'action' => $this->generateUrl('inmueble_add'),
            'method' => 'POST'
        ]);

        return $this->render('InmuebleBundle:Default:add.html.twig', ['form' => $form->createView()]);
    }
}
