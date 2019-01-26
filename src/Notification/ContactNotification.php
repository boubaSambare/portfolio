<?php
namespace App\Notification;

use App\Entity\Contact;
use Twig\Environment;


class ContactNotification
{
    private $mailer;
    /**
     * @var Environment
     */
    private $renderer;


    public function __construct(\Swift_Mailer $mailer, Environment $renderer)
    {
        $this->mailer = $mailer;
        $this->renderer = $renderer;
    }



    public function notify(Contact $contact)
    {
        $message = (new \Swift_Message('Motif:'. $contact->getName()))
            ->setFrom($contact->getEmail())
            ->setTo('boubasambare@yahoo.it')
            ->setBody(
                $this->renderer->render(
                // templates/emails/contact.html.twig
                    'emails/contact.html.twig',
                    ['contact' => $contact]
                ),
                'text/html'
            );
        $this->mailer->send($message);
    }
}