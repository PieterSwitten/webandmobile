<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 05.01.16
 * Time: 11:44
 */

namespace AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ArtsController extends Controller {

    /**
     * @Route("/artsprofielbeheer", name="artsroute")
     */
    public function indexAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $id = $user->getId();

        $arts = $this->getDoctrine()
            ->getRepository('AppBundle:Arts')
            ->find($id);
    }

}