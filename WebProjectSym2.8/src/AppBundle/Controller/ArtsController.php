<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 05.01.16
 * Time: 11:44
 */

namespace AppBundle\Controller;

use AppBundle\Form\ArtsType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;
use AppBundle\Entity\Arts;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ArtsController extends Controller
{

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
     * @Route ("/artsprofielbeheerbewerk", name ="artsprofielbewerkroute")
     */
    public function ArtsprofielBeheerBewerkAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $id = $user->getId();
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Arts');
        $arts = $repository->findByuserid($id);

        $form = $this->createForm(ArtsType::class, $arts);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            //* @var Symfony\Component\HttpFoundation\File\UploadedFile $file*/
            $file = $arts->getProfielfoto();

            $fileName = $arts->getId() . '.'.$file->guessExtension();

            $fileDir = $this->container->getParameter('kernel.root_dir').'/../web/images/profiel';

            $file->move($fileDir, $fileName);

            $arts->setProfielfoto($fileName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($arts);
            $em->flush();
            $this->addFlash('Arts', $arts);


            return $this->redirectToRoute('artsprofielroute');
        } else {
            return $this->render(
                'arts/edit.html.twig',
                array('form' => $form->createView()));
        }

    }


    /**
     * @Route("/artsprofielbeheer", name="artsprofielroute")
     */
    public function ArtsprofielBeheerAction(Request $request)
    {

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