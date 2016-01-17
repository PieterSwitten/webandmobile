<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 05.01.16
 * Time: 11:44
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\User;
use AppBundle\Entity\Arts;

class ArtsController extends Controller {

    /**
     * @Route("/Index", name="artsroute")
     */
    public function indexAction(Request $request)
    {


        return $this->render('arts/artspanel.html.twig');
    }

    /**
     * @Route("/managehours", name="managehoursroute")
     */
    public function manageHoursAction(Request $request)
    {
        return $this->render('arts/managehours.html.twig');
    }

    /**
     * @Route("/deleteappointments", name="deleteappointmentsroute")
     */
    public function deleteAppointmentsAction(Request $request)
    {
        return $this->render('arts/deleteappointments.html.twig');
    }



    /**
     * @Route("/artsprofielbeheer", name="artsprofielroute")
     */
    public function ArtsprofielBeheerAction(Request $request) {

        $user = new User();
        $arts = new Arts();
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $id = $user->getId();

        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Arts');

        $result = $repository->findByuserid($id);


        return $this->render('arts/profile.html.twig', array('results' => $result));
    }

}