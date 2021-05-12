<?php

namespace App\Controller;

use App\Entity\User; // la class User() est importée
use App\Form\RegisterType; // la class RegisterType() est importée
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegisterController extends AbstractController
{
    /**
     * @Route("/inscription", name="register")
     */
    public function index(): Response
    {
        // on instancie la classe User et on l'affecte à la variable user
        $user = new User();

        // on instancie le formulaire avec la méthode createForm et on l'affecte à la variable $form
        // la méthode demande deux paramètres : la classe du formulaire et les données ici notre objet $user
        $form = $this->createForm(RegisterType::class, $user);

        return $this->render('register/index.html.twig', [
            // on passe le formulaire en variable à notre template
            // une clé 'form' (vous pouvez mettre autre chose)
            // puis on demande la création de la vue de notre objet $form avec la méthode createView()
            'form' => $form->createView()
        ]);
    }
}
