<?php
/**
 * Created by PhpStorm.
 * User: pieter
 * Date: 1/12/16
 * Time: 10:35 AM
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    /**
     * @Route("/adminpage", name="adminroute")
     */
    public function indexAction(Request $request)
    {
        return $this->render('admin/adminpanel.html.twig');
    }

    /**
     * @Route("/artscontrolpage", name="artscontrolroute")
     */
    public function artsControl(Request $request)
    {
        return $this->render('admin/artscontrol.html.twig');
    }

    /**
     * @Route("/locationcontrolpage", name="locationcontrolroute")
     */
    public function locationControl(Request $request)
    {
        return $this->render('admin/locationarts.html.twig');
    }

    /**
     * @Route("/locationartspage", name="locationartsroute")
     */
    public function locationArts(Request $request)
    {
        return $this->render('admin/locationcontrol.html.twig');
    }
}