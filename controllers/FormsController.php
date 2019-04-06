<?php
require_once("Request.php");
require_once("Http.php");
require_once("Session.php");



class FormsController{

    public function save()
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


// // 2bis Récupération de l'id de l'utilisateur connecté
//         $user_id = $_SESSION['user']['id'];

// // 2ter Date de publication
//         $createdAt = date('Y-m-d H:i:s');

// // 3 Création du model status et du tableau $data
//         $data = compact('content', 'user_id', 'createdAt');

// // 4 Insertion avec la méthode insert()
//         $this->model->insert($data);

// 5 Redirection vers l'index
        Session::addFlash('success', "Bravo, votre formulaire est bien rempli.");
        Http::redirect('index.php');
    }

}

?>