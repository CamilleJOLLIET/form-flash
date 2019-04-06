<?php
require_once("Request.php");
require_once("Http.php");
require_once("Session.php");

class FormsController{

    /**
     * Permet de verifier si la saisie du formulaire est conforme
     *
     * @return void
     */
    public function verify()
    {
        Request::redirectIfNotSubmitted('index.php');
        
        $firstname = Request::get('firstname', Request::SAFE);
        $lastname = Request::get('lastname', Request::SAFE);
        $mail = Request::get('mail', Request::SAFE);
        $description = Request::get('description', Request::SAFE);

        if (!$firstname) {
            Session::addFlash('errors', "Vous devez renseigner votre prénom avant de soumettre le formulaire.");
            Http::redirectBack();
        }

        if (!$lastname) {
            Session::addFlash('errors', "Vous devez renseigner votre nom de famille avant de soumettre le formulaire.");
            Http::redirectBack();
        }

        if (!$mail) {
            Session::addFlash('errors', "Vous devez vous décrire avant de soumettre le formulaire.");
            Http::redirectBack();
        }

        if (!$description) {
            Session::addFlash('errors', "Vous devez renseigner votre email avant de soumettre le formulaire.");
            Http::redirectBack();
        }

        Session::addFlash('success', "Bravo, votre formulaire est bien rempli.");
        Http::redirect('index.php');
    }

}

?>