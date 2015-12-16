<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Users;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
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
        return new Response("Hello<br/>");
    }
    /**
     * @Route("/user", name="userroute")
     */
    public function userAction(Request $request)
    {
        return new Response("userpage:<br/>");
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
    public function loginCheckAction()
    {
        // NB hier geen code: het framework voorziet de controles/acties
        return new Response("Fout<br/>");
    }
    /**
     * @Route("/quit", name="quitroute")
     */
    public function quitAction(Request $request)
    {
        // NB hier geen code: het framework voorziet de acties
    }

    /**
     * @Route("/makeusers")
     */
    public function makeUsersAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = new Users();
        $user->setUserName('admin');
        $user->setRoleString(
            'ROLE_ADMIN ROLE_USER');
        $password = 'a1';
        $encoder = $this->container->
        get('security.password_encoder');
        $encoded = $encoder->encodePassword($user,
            $password);
        $user->setUserPassword($encoded);
        $em->persist($user);
        $em->flush();
        return new Response('Created user');
    }

}
