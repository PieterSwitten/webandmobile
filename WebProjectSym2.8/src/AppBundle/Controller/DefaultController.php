<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\User;
use AppBundle\Form\UserType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homeroute")
     */
    public function indexAction(Request $request)
    {
        return $this->render('default/index.html.twig');
    }



    /**
     * @Route("/userpage", name="userroute")
     */
    public function userAction(Request $request)
    {
        return new Response("userpage<br/>");
    }
    /**
     * @Route("/adminpage", name="adminroute")
     */
    public function adminAction(Request $request)
    {
        return new Response("adminpage<br/>");
    }

    /**
     * @Route("/login", name="loginroute")
     */
    public function loginAction(Request $request)
    {
        return $this->render('default/login.html.twig');
    }

    /**
     * @Route("/login_check", name="checkroute")
     */
    public function loginCheckAction(){ }

    /**
     * @Route("/quit", name="quitroute")
     */
    public function quitAction(Request $request) { }


    /**
     * @Route("/registerpage", name="registerroute")
     */
    public function registerAction(Request $request) {
        $password = "";
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $user->setRolesString("ROLE_USER");
            $password = $user->getPassword();
            $encoder = $this->container->
            get('security.password_encoder');
            $encoded = $encoder->encodePassword($user, $password);
            $user->setPassword($encoded);
            $em->persist($user);
            $em->flush();
            $this->addFlash('User',$user);
            return $this->redirectToRoute('homeroute');
        } else {
            return $this->render(
                'default/new.html.twig',
                array('form' => $form->createView()));
        }
    }
}
