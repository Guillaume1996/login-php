<?php   
    // Démarrage de la session 
    session_start();
    // Include de la base de données
    require_once '../config.php';


    // Si la session n'existe pas 
    if(!isset($_SESSION['user']))
    {
        header('Location:../index.php');
        die();
    }


    // Si les variables existent 
    if(isset($_POST['current_nom']) && isset($_POST['new_nom']) && isset($_POST['new_nom_retype'])){
        // XSS 
        $current_nom = htmlspecialchars($_POST['current_nom']);
        $new_nom = htmlspecialchars($_POST['new_nom']);
        $new_nom_retype = htmlspecialchars($_POST['new_nom_retype']);


        $check_nom  = $bdd->prepare('SELECT nom FROM etudiant WHERE email = :email');
        $check_nom->execute(array(
            "email" => $_SESSION['user']
        ));
        $data_nom = $check_nom->fetch();

        //$current_password = hash('sha256', $current_password);

        if($data_nom['nom'] === $current_nom)
        {
            if($new_nom == $new_nom_retype){

                //$new_nom = hash('sha256', $new_nom);
                $update = $bdd->prepare('UPDATE etudiant SET nom = :nom WHERE email = :email');
                $update->execute(array(
                    "nom" => $new_nom,
                    "email" => $_SESSION['user']
                ));
                header('Location: ../landing.php?err=success_nom');
                die();
            }
        }
        else{
            header('Location: ../landing.php?err=current_nom');
            die();
        }



    }



