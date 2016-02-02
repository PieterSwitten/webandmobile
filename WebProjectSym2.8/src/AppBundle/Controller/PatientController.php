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
use Symfony\Component\Validator\Constraints\DateTime;


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
     * @Route("/afspraken/{arts}/{dag}/{index}", defaults={"arts"="Niet geselecteerd", "dag"="Niet geselecteerd", "index"=-1}, name="patientAfsprakenroute")
     */
    public function afsprakenAction(Request $request, $arts, $dag, $index)
    {
        $reposArts = $this->getDoctrine()
            ->getRepository('AppBundle:Arts');

        $artsen = $reposArts->findAll();

        $reposUren = $this->getDoctrine()->getRepository('AppBundle:Uren');
        $uren = $reposUren->findAll();

        return $this->render('patient/afspraken.html.twig', array('artsen' => $artsen, 'arts' => $arts, 'dag' => $dag, 'uren' => $uren, 'index' => $index));

    }

    /**
     * @Route("/reserveren/{uurindex}/{dagindex}/{arts}", name="reserverenroute")
     */
    public function reserverenAction(Request $request, $uurindex, $dagindex, $arts)
    {


        return $this->render('patient/makereservation.html.twig', array('uurindex' => $uurindex, 'dagindex' => $dagindex, 'arts' => $arts));
    }

    /**
     * @Route("/reserveer/{uurindex}/{dagindex}/{arts}", name="reserveerroute")
     */
    public function reserveerAction(Request $request, $uurindex, $dagindex, $arts)
    {
        if (isset($_POST['submit'])) {
            $opmerking = $_POST['opmerkingArea'];
        }
        $today = date("Y-m-d");
        $year = date("Y");
        $month = date("m");
        $day = date("d");
        $day = $day + $dagindex;
        $today = $today .

        $datum = new DateTime();


        return new Response($opmerking);
    }
}