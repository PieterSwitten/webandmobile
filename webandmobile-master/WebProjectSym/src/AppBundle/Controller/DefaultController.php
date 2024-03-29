<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Gregwar\CaptchaBundle\Type\CaptchaType;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Form\UserType;

class DefaultController extends Controller
{

    /**
     * @Route("/", name="homeroute")
     */
    public function indexAction(Request $request)
    {
        return $this->render('default/index.html.twig');
    }



    /**
     * @Route("/userpage", name="userroute")
     */
    public function userAction(Request $request)
    {
        return new Response("userpage<br/>");
    }

    /**
     * @Route("/login", name="loginroute")
     */
    public function loginAction(Request $request)
    {
        return $this->render('default/login.html.twig');
    }

    /**
     * @Route("/login_check", name="checkroute")
     */
    public function loginCheckAction(){ }

    /**
     * @Route("/quit", name="quitroute")
     */
    public function quitAction(Request $request) { }


    /**
     * @Route("/registerpage", name="registerroute")
     */
    public function registerAction(Request $request) {
        $password = "";
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $user->setRolesString("ROLE_USER");
            $password = $user->getPassword();
            $encoder = $this->container->
            get('security.password_encoder');
            $encoded = $encoder->encodePassword($user, $password);
            $user->setPassword($encoded);
            $em->persist($user);
            $em->flush();
            $this->addFlash('User',$user);
            return $this->redirectToRoute('homeroute');
        } else {
            return $this->render(
                'default/new.html.twig',
                array('form' => $form->createView()));
        }
    }
    /**
     * @Route("/makeusers")
     */
    public function makeUsersAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = new User();
        $user->setUserName('admin1');
        $user->setRolesString(
            'ROLE_ADMIN ROLE_USER');
        $password = 'a1';
        $encoder = $this->container->
        get('security.password_encoder');
        $encoded = $encoder->encodePassword($user,
            $password);
        $user->setPassword($encoded);
        $em->persist($user);
        $em->flush();
        return new Response('Created user');
    }



}
