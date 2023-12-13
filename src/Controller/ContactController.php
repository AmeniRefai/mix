<?php
namespace App\Controller;

use App\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request): Response
    {
        $contact = new Contact();
        $form = $this->createFormBuilder($contact)
            ->add('name')
            ->add('email')
            ->add('message')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Vous pouvez traiter les données du formulaire ici, par exemple, les enregistrer dans la base de données.
            // Ensuite, redirigez ou effectuez d'autres actions.
            // Exemple : $entityManager->persist($contact); $entityManager->flush();

            return $this->redirectToRoute('contact_success');
        }

        return $this->render('contact/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/contact/success", name="contact_success")
     */
    public function success(): Response
    {
        return $this->render('contact/success.html.twig');
    }
}
