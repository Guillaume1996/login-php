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
    if(isset($_POST['current_password']) && isset($_POST['new_password']) && isset($_POST['new_password_retype'])){
        // XSS 
        $current_password = htmlspecialchars($_POST['current_password']);
        $new_password = htmlspecialchars($_POST['new_password']);
        $new_password_retype = htmlspecialchars($_POST['new_password_retype']);


        $check_password  = $bdd->prepare('SELECT password FROM etudiant WHERE email = :email');
        $check_password->execute(array(
            "email" => $_SESSION['user']
        ));
        $data_password = $check_password->fetch();

        //$current_password = hash('sha256', $current_password);

        if($data_password['password'] === $current_password)
        {
            if($new_password == $new_password_retype){

                $new_password = hash('sha256', $new_password);
                $update = $bdd->prepare('UPDATE etudiant SET password = :password WHERE email = :email');
                $update->execute(array(
                    "password" => $new_password,
                    "email" => $_SESSION['user']
                ));
                header('Location: ../landing.php?err=success_password');
                die();
            }
        }
        else{
            header('Location: ../landing.php?err=current_password');
            die();
        }



    }



