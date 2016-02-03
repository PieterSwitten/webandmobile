<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\View\View;
use AppBundle\Response as AfspraakResponse;

class AfsprakenController extends FOSRestController
{

    public function postAfsprakenAction(Request $request)
    {

        $data =  $this->getAfspraken();
        $view = $this->view($data, 200)
            ->setTemplate("MyBundle:Users:getUsers.html.twig")
            ->setTemplateVar('users')
        ;

        return $this->handleView($view);
    }

    public function redirectAction()
    {
        $view = $this->redirectView($this->generateUrl('getafspraken'), 301);

        return $this->handleView($view);
    }

    public function getAfspraken() {

        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Uren');

        $result = $repository->findAll();
        return $result;

    }

    public function postAppointmentsAction(Request $req) {

        $id = $this->doctorLogin($username, $password);

        if (is_null($username) || $username == "" || is_null($password) || $password == "") {
            $apps = array('ERROR');
        } else if ($id == -1) {
            $apps = array('NOK');
        } else {
            $apps = array();

            $appointments = $this->getAppointments($id);

            foreach ($appointments as $key => $value) {
                $toAdd = array();
                $toAdd['id'] = $value->getId();
                $toAdd['start'] = date_format($value->getAppointmentStart(), "D, d/m H:i");
                $toAdd['end'] = date_format($value->getAppointmentEnd(), "D, d/m H:i");
                $toAdd['doctor'] = $value->getDoctor()->getName();
                if (is_null($value->getPatient()))
                    $toAdd['patient'] = 'No patient';
                else
                    $toAdd['patient'] = $value->getPatient()->getName();
                $apps[$key] = $toAdd;
            }
        }

        $data = new AppointmentResponse($apps);
        $view = new View($data);
        $response = $this->get('fos_rest.view_handler')->handle($view);
        $response->headers->set('Access-Control-Allow-Origin', '*');

        return $response;
    }

}