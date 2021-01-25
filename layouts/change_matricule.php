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
    if(isset($_POST['current_matricule']) && isset($_POST['new_matricule']) && isset($_POST['new_matricule_retype'])){
        // XSS 
        $current_matricule = htmlspecialchars($_POST['current_matricule']);
        $new_matricule = htmlspecialchars($_POST['new_matricule']);
        $new_matricule_retype = htmlspecialchars($_POST['new_matricule_retype']);


        $check_matricule  = $bdd->prepare('SELECT matricule FROM etudiant WHERE email = :email');
        $check_matricule->execute(array(
            "email" => $_SESSION['user']
        ));
        $data_matricule = $check_matricule->fetch();

        

        if($data_matricule['matricule'] === $current_matricule)
        {
            if($new_matricule == $new_matricule_retype){

                
                $update = $bdd->prepare('UPDATE etudiant SET matricule = :matricule WHERE email = :email');
                $update->execute(array(
                    "matricule" => $new_matricule,
                    "email" => $_SESSION['user']
                ));
                header('Location: ../landing.php?err=success_matricule');
                die();
            }
        }
        else{
            header('Location: ../landing.php?err=current_matricule');
            die();
        }



    }
