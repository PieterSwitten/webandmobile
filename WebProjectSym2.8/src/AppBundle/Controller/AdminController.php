<?php
/**
 * Created by PhpStorm.
 * User: pieter
 * Date: 1/12/16
 * Time: 10:35 AM
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Arts;
use AppBundle\Form\ArtsType;
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

        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Arts');

        $result = $repository->findAll();


        //return $this->render('arts/profile.html.twig', array('results' => $result));
        return $this->render('admin/artscontrol.html.twig', array('results' => $result));
    }

    /**
     * @Route("/artseditbyadminpage/{id}", name="artseditbyadminroute")
     */
    public function artsEditByAdmin(Request $request, $id)
    {


        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Arts');

        $result = $repository->findByuserid($id);

        $arts = new Arts();
        $form = $this->createForm(ArtsType::class, $arts);
        $form->handleRequest($request);

        if ($form->isValid()) {


            // $file stores the uploaded PDF file
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $arts->getProfielfoto();

            // Generate a unique name for the file before saving it
            $fileName = $id.'.'."jpeg";

            // Move the file to the directory where brochures are stored
            $brochuresDir = $this->container->getParameter('kernel.root_dir').'/../web/images/profiel';
            $file->move($brochuresDir, $fileName);


            $data = $form->getData();


            // Update the 'brochure' property to store the PDF file name
            // instead of its contents

            $em = $this->getDoctrine()->getManager();
            $arts = $em->getRepository('AppBundle:Arts')->find($id);


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

            return $this->redirectToRoute('artscontrolroute');
            //return $this->redirect($this->generateUrl('app_product_list'));
        }

        return $this->render('arts/edit.html.twig', array(
            'form' => $form->createView(),
        ));

    }

    /**
     * @Route("/deleteartspage/{id}", name="deleteartsroute")
     */
    public function deleteArtsPage(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        //$arts = new Arts();
        $arts = $em->getRepository('AppBundle:Arts')->find($id);

        if (!$arts) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }
        $em->remove($arts);
        $em->flush();

        return $this->redirectToRoute('artscontrolroute');
    }

    /**
     * @Route("/locationcontrolpage", name="locationcontrolroute")
     */
    public function locationControl(Request $request)
    {

        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Locaties');

        $result = $repository->findAll();

        return $this->render('admin/locationcontrol.html.twig' , array('results' => $result));
    }

    /**
     * @Route("/locationartspage", name="locationartsroute")
     */
    public function locationArts(Request $request)
    {




        return $this->render('admin/locationarts.html.twig');
    }
}