<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 19.01.16
 * Time: 10:11
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Uren;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Arts;


class PatientController extends Controller {


    /**
     * @Route("/dokterprofielen", name="patientDokterprofielen")
     */
    public function indexAction(Request $request)
    {
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Arts');

        $result = $repository->findAll();

        return $this->render('patient/dokterprofielen.html.twig', array('results' => $result));
    }

    /**
     * @Route("/afspraken/{arts}/{dag}", defaults={"arts"="Niet geselecteerd", "dag"="Niet geselecteerd"}, name="patientAfsprakenroute")
     */
    public function afsprakenAction(Request $request, $arts, $dag)
    {
        $reposArts = $this->getDoctrine()
            ->getRepository('AppBundle:Arts');

        $artsen = $reposArts->findAll();

        $reposUren = $this->getDoctrine()->getRepository('AppBundle:Uren');
        $uren = $reposUren->findAll();

        return $this->render('patient/afspraken.html.twig', array('artsen' => $artsen, 'arts' => $arts, 'dag' => $dag, 'uren' => $uren));

    }

    /**
     * @Route("/reserveren/{date}", name="reserverenroute")
     */
    public function reserverenAction(Request $request, $datetime)
    {
        return $this->render('makeReservation.html.twig', array('datetime' => $datetime));
    }
}