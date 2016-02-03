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
use \DateTime;


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

        $user = $this->get('security.token_storage')->getToken()->getUser();
        $userid = $user->getId();

        return $this->render('patient/afspraken.html.twig', array('artsen' => $artsen, 'arts' => $arts, 'dag' => $dag, 'uren' => $uren, 'index' => $index, 'logedinId' => $userid));

    }

    /**
     * @Route("/reserveren/{uurindex}/{dagindex}/{arts}", name="reserverenroute")
     */
    public function reserverenAction(Request $request, $uurindex, $dagindex, $arts)
    {


        return $this->render('patient/makereservation.html.twig', array('uurindex' => $uurindex, 'dagindex' => $dagindex, 'arts' => $arts));
    }

    /**
     * @Route("/delete/{afspraakid}", name="verwijderafspraakroute")
     */
    public function deleteAppointmentAction(Request $request, $afspraakid)
    {
        $em = $this->getDoctrine()->getManager();
        //$arts = new Arts();
        $uur = $em->getRepository('AppBundle:Uren')->find($afspraakid);
        $uurid = $uur->getId();

        if (!$uur) {
            throw $this->createNotFoundException(
                'No arts found for id '.$uurid
            );
        }


        $em->remove($uur);
        $em->flush();

        return $this->redirectToRoute('patientAfsprakenroute');
    }

    /**
     * @Route("/afspraakdetailspatient/{afspraakid}", name="afspraakdetailpatientsroute")
     */
    public function afspraakDetailsAction(Request $request, $afspraakid)
    {
        $reposUren = $this->getDoctrine()->getRepository('AppBundle:Uren');
        $uren = $reposUren->find($afspraakid);

        return $this->render('arts/afspraakdetails.html.twig', array('afspraak' => $uren));
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
        $date = date('Y-m-d', strtotime($today . '+' . $dagindex . 'days'));
        $time = date('9:00');
        $uur = date('h:i', strtotime($time)+(60*30*$uurindex));

        $em = $this->getDoctrine()->getManager();
        $artsen = $em->getRepository('AppBundle:Arts')->findAll();
        foreach ($artsen as $item) {
            $test_string = $item->getNaam() . ' ' . $item->getActhernaam();
            if ($test_string == $arts) {
                $artsid = $item->getId();
            }
        }

        $artsdata = $em->getRepository('AppBundle:Arts')->find($artsid);

        $datum = date($date . ' ' . $uur);

        $user = $this->get('security.token_storage')->getToken()->getUser();


        $adduur = new Uren();
        $adduur->setOpmerkingen($opmerking);
        $adduur->setDatum($datum);
        $adduur->setUserid($user);
        $adduur->setArtsid($artsdata);

        $eme = $this->getDoctrine()->getManager();

        $eme->persist($adduur);
        $eme->flush();


        return $this->redirectToRoute('patientAfsprakenroute');
    }
}