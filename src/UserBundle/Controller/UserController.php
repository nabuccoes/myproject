<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use UserBundle\Entity\User;
use UserBundle\Form\UserType;

class UserController extends Controller
{
    public function getAllAction()
    {
        $users = $this->getDoctrine()
            ->getRepository('UserBundle:User')
            ->findAll();

        return $this->render('UserBundle:Default:list.html.twig', ['users' => $users]);
    }

    public function getByIdAction($id)
    {
        $user = $this->getDoctrine()->getRepository("UserBundle:User")->findOneById($id);

        return $this->render('UserBundle:Default:detail.html.twig', ['user' => $user]);
    }

    public function addAction()
    {
        $form = $this->createForm(new UserType(), new User(), [
            'action' => $this->generateUrl('user_insert'),
            'method' => 'POST'
        ]);

        return $this->render('UserBundle:Default:add.html.twig', ['form' => $form->createView()]);
    }

    public function insertAction(Request $request)
    {
        $user     = new User();
        $userForm = new UserType();
        $form     = $this->createForm($userForm, $user, [
            'action' => $this->generateUrl('user_insert'),
            'method' => 'POST'
        ]);

        $form->handleRequest($request);

        if($form->isValid()) {
            $password  = $form->get('password')->getData();
            $encoder   = $this->container->get('security.password_encoder');
            $encoded   = $encoder->encodePassword($user, $password);
            $user->setPassword($encoded);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('user_list');
        }

        return $this->render('UserBundle:Default:add.html.twig', ['form' => $form->createView()]);
    }
}


