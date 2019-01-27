<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Notification\ ContactNotification;
use App\Entity\Project;

class HomePageController extends AbstractController
{
    /**
     * @Route("/", name="home_page")
     */
    public function index( Request $request, ContactNotification $notification)
    {
        $contact = new Contact();
        $entityManager = $this->getDoctrine()->getManager();
        $projects = $entityManager->getRepository(Project::class)->findAll();
        $form = $this->createForm(ContactType::class,$contact);
        $form->handleRequest($request);
        dump($projects);

        if ($form->isSubmitted() && $form->isValid())
        {
            // $this->redirectToRoute('home_page');
            //envoi mail
            $notification->notify($contact);
            $success = $this->addFlash('success','Votre message a été transmis avec succes ');
            return $this->redirectToRoute('home_page');
        }
        return $this->render('home_page/index.html.twig', [
            'controller_name' => 'HomePageController',
            'form'            =>  $form->createView(),
            'projects'         => $projects,
        ]);
    }
}
