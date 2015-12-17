<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;
use Symfony\Component\HttpFoundation\Response;

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
     * @Route("/adminpage", name="adminroute")
     */
    public function adminAction(Request $request)
    {
        return new Response("adminpage<br/>");
    }

    /**
     * @Route("/userpage", name="userroute")
     */
    public function userAction(Request $request)
    {
        return new Response("userpage<br/>");
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
     * @Route("/makeusers")
     */
    public function makeUsersAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = new User();
        $user->setUserName('admin1');
        $user->setRolesString(
            'ROLE_ADMIN ROLE_USER');
        $password = 'a1';
        $encoder = $this->container->
        get('security.password_encoder');
        $encoded = $encoder->encodePassword($user,
            $password);
        $user->setPassword($encoded);
        $em->persist($user);
        $em->flush();
        return new Response('Created user');
    }

}
