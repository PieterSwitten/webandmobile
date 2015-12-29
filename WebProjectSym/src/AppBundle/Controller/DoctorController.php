<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DoctorController extends Controller
{

    /**
     * @Route("/artspage", name="artsroute")
     */
    public function indexAction(Request $request)
    {
        return $this->render('default/arts.index.html.twig');
    }

    /**
     * @Route ("/artsProfilepage", name="artsProfileroute")
     */
    public function beheerProfileAction(Request $request)
    {
        return new Response("Hier kan je je profiel gaan beheren<br/>");
    }

    /**
    * @Route ("/artsAfsprakenpage", name="artsAfsprakenroute")
     */
    public function beheerAfsprakenAction(Request $request)
    {
        return new Response("Hier kan je je afspraken gaan beheren<br/>");
    }

    /**
     * @Route ("/artsUrenpage", name="artsUrenroute")
     */
    public function beheerUrenAction(Request $request)
    {
        return new Response("Hier kan je je uren gaan beheren<br/>");
    }
}
