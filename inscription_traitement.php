<?php 
    require_once 'config.php';

    if(isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_retype']) && isset($_POST['matricule']))
    {
        $nom = htmlspecialchars($_POST['nom']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $password_retype = htmlspecialchars($_POST['password_retype']);
        $matricule = htmlspecialchars($_POST['matricule']);

        $check = $bdd->prepare('SELECT nom, email, password, matricule FROM etudiant WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        if($row == 0){ 
            if(strlen($nom) <= 100){
                if(strlen($email) <= 100){
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                        if($password == $password_retype){

                           // $password = hash('sha256', $password);

                            $insert = $bdd->prepare('INSERT INTO etudiant(nom, email, password, matricule) VALUES(:nom, :email, :password, :matricule)');
                            $insert->execute(array(
                                'nom' => $nom,
                                'email' => $email,
                                'password' => $password,
                                'matricule' => $matricule
                            ));

                            header('Location:inscription.php?reg_err=success');
                            die();
                        }else{ header('Location: inscription.php?reg_err=password'); die();}
                    }else{ header('Location: inscription.php?reg_err=email'); die();}
                }else{ header('Location: inscription.php?reg_err=email_length'); die();}
            }else{ header('Location: inscription.php?reg_err=nom_length'); die();}
        }else{ header('Location: inscription.php?reg_err=already'); die();}
    }
