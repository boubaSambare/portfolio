<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Notification\ ContactNotification;

class HomePageController extends AbstractController
{
    /**
     * @Route("/", name="home_page")
     */
    public function index( Request $request, ContactNotification $notification)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class,$contact);
        $form->handleRequest($request);
        dump($form);

        if ($form->isSubmitted() && $form->isValid())
        {
            // $this->redirectToRoute('goooo');
            //envoi mail
            $notification->notify($contact);
        }
        return $this->render('home_page/index.html.twig', [
            'controller_name' => 'HomePageController',
            'form'            =>  $form->createView(),
        ]);
    }
}
