<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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
    //HAHAHAHAHAAHAHH TEST
    // TEST TEST
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
    }
    /**
     * @Route("/quit", name="quitroute")
     */
    public function quitAction(Request $request)
    {
        // NB hier geen code: het framework voorziet de acties
    }

}
