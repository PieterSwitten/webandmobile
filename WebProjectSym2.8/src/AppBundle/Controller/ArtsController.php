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
use AppBundle\Entity\Product;
use AppBundle\Form\ProductType;

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

        $result = $repository->findByuserid($id);
        $ids = $result[0]->getId();

        $arts = new Arts();
        $form = $this->createForm(ArtsType::class, $arts);
        $form->handleRequest($request);

        if ($form->isValid()) {


            // $file stores the uploaded PDF file
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $arts->getProfielfoto();

            // Generate a unique name for the file before saving it
            $fileName = $ids.'.'."jpeg";

            // Move the file to the directory where brochures are stored
            $brochuresDir = $this->container->getParameter('kernel.root_dir').'/../web/images/profiel';
            $file->move($brochuresDir, $fileName);


            $data = $form->getData();


            // Update the 'brochure' property to store the PDF file name
            // instead of its contents

                $em = $this->getDoctrine()->getManager();
            $arts = $em->getRepository('AppBundle:Arts')->find($ids);


            if (!$arts) {
                throw $this->createNotFoundException(
                    'No Arts found for id '
                );
            }
            $arts->setProfielfoto($fileName);
            $arts->setNaam($data->getNaam());
            $arts->setActhernaam($data->getActhernaam());
            $arts->setAdress($data->getAdress());
            $arts->setEmail($data->getEmail());
            $arts->setId($data->getId());

            // ... persist the $product variable or any other work

            $em->flush();

            return $this->render('arts/artspanel.html.twig');
            //return $this->redirect($this->generateUrl('app_product_list'));
        }

        return $this->render('arts/edit.html.twig', array(
            'form' => $form->createView(),
        ));

    }

    function UpdateAction($data) {
        $em = $this->getDoctrine()->getManager();
        $arts = $em->getRepository('AppBundle:Arts')->find($data->getId());

        if (!$arts) {
            throw $this->createNotFoundException(
                'No Arts found for id '.$data.getId()
            );
        }

        $arts->setNaam($data->getNaam());
        $arts->setId($data->getId());
        $arts->setActhernaam($data->getActhernaam());
        $arts->setEmail($data->getEmail());
        $arts->setAdress($data->getAdress());
        $arts->setUserid($data->getUserid());
        $arts->setProfielfoto($data->getProfielfoto());
        $em->flush();
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