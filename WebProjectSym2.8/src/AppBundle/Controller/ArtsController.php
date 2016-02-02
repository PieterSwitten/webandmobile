<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 05.01.16
 * Time: 11:44
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Uren;
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
     * @Route("/deleteappointments/{dag}/{index}", defaults={"dag"="Niet geselecteerd", "index"=-1}, name="deleteappointmentsroute")
     */
    public function deleteAppointmentsAction(Request $request, $dag, $index)
    {

        $user = $this->get('security.token_storage')->getToken()->getUser();

        $reposArtsen = $this->getDoctrine()->getRepository('AppBundle:Arts');
        $artsen = $reposArtsen->findAll();

        foreach ($artsen as $arts) {
            if ($arts->getUserid() == $user) {
                $sendarts = $arts;
            }
        }

        $reposUren = $this->getDoctrine()->getRepository('AppBundle:Uren');
        $uren = $reposUren->findAll();

        return $this->render('arts/deleteappointments.html.twig', array('dag' => $dag, 'uren' => $uren, 'index' => $index, 'logedinarts' => $sendarts));
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

    /**
     * @Route("/delete/{afspraakid}/{dagindex}/{dag}", name="artsverwijderafspraakroute")
     */
    public function deleteAppointmentAction(Request $request, $afspraakid, $dagindex, $dag)
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

        return $this->redirectToRoute('deleteappointmentsroute', array('dag' => $dag, 'index' => $dagindex));
    }

    /**
     * @Route("/reserveer/{uurindex}/{dagindex}/{dag}", name="blokroute")
     */
    public function blokAction(Request $request, $uurindex, $dagindex, $dag)
    {
        $today = date("Y-m-d");
        $date = date('Y-m-d', strtotime($today . '+' . $dagindex . 'days'));
        $time = date('9:00');
        $uur = date('h:i', strtotime($time)+(60*30*$uurindex));


        $datum = date($date . ' ' . $uur);

        $user = $this->get('security.token_storage')->getToken()->getUser();

        $reposArtsen = $this->getDoctrine()->getRepository('AppBundle:Arts');
        $artsen = $reposArtsen->findAll();

        foreach ($artsen as $arts) {
            if ($arts->getUserid() == $user) {
                $sendarts = $arts;
            }
        }


        $adduur = new Uren();
        $adduur->setOpmerkingen('Geblokkeerd door arts');
        $adduur->setDatum($datum);
        $adduur->setUserid($user);
        $adduur->setArtsid($sendarts);

        $eme = $this->getDoctrine()->getManager();

        $eme->persist($adduur);
        $eme->flush();


        return $this->redirectToRoute('deleteappointmentsroute', array('dag' => $dag, 'index' => $dagindex));
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