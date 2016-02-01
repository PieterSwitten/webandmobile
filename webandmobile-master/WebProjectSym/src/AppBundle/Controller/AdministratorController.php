<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdministratorController extends Controller
{

    /**
     * @Route("/adminpage", name="adminroute")
     */
    public function adminAction(Request $request)
    {
        return $this->render('default/Admin/index.html.twig');
    }

    /**
     * @Route("/BeheerArts", name="artsbeheer")
     */
    public function adminArtsBeheerAction(Request $request)
    {
        $entities = $this->getDoctrine()->getRepository("AppBundle:Arts")->findAll();
        return $this->render('default/Admin/artsbeheer.index.html.twig', array('entities' => $entities));
    }
}
