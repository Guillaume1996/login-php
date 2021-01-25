<?php 
    session_start();
    // if(!isset($_SESSION['user']))
    //     header('Location:index.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>profile</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap.min.css">
  </head>
  <body>
        <div class="container">
            <div class="col-md-12">
                <?php 
                        if(isset($_GET['err'])){
                            $err = htmlspecialchars($_GET['err']);
                            switch($err){
                                case 'current_password':
                                    echo "<div class='alert alert-danger'>Le mot de passe actuel est incorrect</div>";
                                break;

                                case 'success_password':
                                    echo "<div class='alert alert-success'>Le mot de passe a bien été modifié ! </div>";
                                break; 
                            }
                        }
                    ?>

                    <?php 
                        if(isset($_GET['err'])){
                            $err = htmlspecialchars($_GET['err']);
                            switch($err){
                                case 'current_nom':
                                    echo "<div class='alert alert-danger'>Le nom actuel est incorrect</div>";
                                break;

                                case 'success_nom':
                                    echo "<div class='alert alert-success'>Le nom a bien été modifié ! </div>";
                                break; 
                            }
                        }
                    ?>


                    <?php 
                        if(isset($_GET['err'])){
                            $err = htmlspecialchars($_GET['err']);
                            switch($err){
                                case 'current_matricule':
                                    echo "<div class='alert alert-danger'>Le numero matricule actuel est incorrect</div>";
                                break;

                                case 'success_matricule':
                                    echo "<div class='alert alert-success'>Le numero matricule a bien été modifié ! </div>";
                                break; 
                            }
                        }
                    ?>


                <div class="text-center">
                        <h1 class="p-5">Bonjour ! <?php echo $_SESSION['user']; ?></h1>
                        <hr />
                        <!-- Button de modification mot de passe -->
                        <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#change_password">
                          Changer mon mot de passe
                        </button>

                        <!-- Button de modification nom -->
                        <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#change_nom">
                          Changer mon nom
                        </button>

                        <!-- Button de modification matricule -->
                        <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#change_matricule">
                          Changer matricule
                        </button>

                </div>
            </div>
        </div>    

       

        

                                
        <!-- boite alerte pour changement de mot de passe -->
        <div class="modal fade" id="change_password" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Changer mon mot de passe</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                         </div>
                            <div class="modal-body">
                                <form action="layouts/change_password.php" method="POST">
                                    <label for='current_password'>Mot de passe actuel</label>
                                    <input type="password" id="current_password" name="current_password" class="form-control" required/>
                                    <br />
                                    <label for='new_password'>Nouveau mot de passe</label>
                                    <input type="password" id="new_password" name="new_password" class="form-control" required/>
                                    <br />
                                    <label for='new_password_retype'>Re tapez le nouveau mot de passe</label>
                                    <input type="password" id="new_password_retype" name="new_password_retype" class="form-control" required/>
                                    <br />
                                    <button type="submit" class="btn btn-success">Sauvegarder</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>


                         <!-- boite alerte pour changement de nom -->
                <div class="modal fade" id="change_nom" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Changer mon nom</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                         </div>
                            <div class="modal-body">
                                <form action="layouts/change_nom.php" method="POST">
                                    <label for='current_nom'>nom actuel</label>
                                    <input type="text" id="current_nom" name="current_nom" class="form-control" required/>
                                    <br />
                                    <label for='new_nom'>Nouveau nom</label>
                                    <input type="text" id="new_nom" name="new_nom" class="form-control" required/>
                                    <br />
                                    <label for='new_nom_retype'>Re tapez le nouveau nom</label>
                                    <input type="text" id="new_nom_retype" name="new_nom_retype" class="form-control" required/>
                                    <br />
                                    <button type="submit" class="btn btn-success">Sauvegarder</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>

                           <!-- boite alerte pour changement de matricule -->
                           <div class="modal fade" id="change_matricule" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Changer matricule</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                         </div>
                            <div class="modal-body">
                                <form action="layouts/change_matricule.php" method="POST">
                                    <label for='current_matricule'>matricule actuel</label>
                                    <input type="text" id="current_matricule" name="current_matricule" class="form-control" required/>
                                    <br />
                                    <label for='new_matricule'>Nouveau matricule</label>
                                    <input type="text" id="new_matricule" name="new_matricule" class="form-control" required/>
                                    <br />
                                    <label for='new_matricule_retype'>Re tapez le nouveau matricule</label>
                                    <input type="text" id="new_matricule_retype" name="new_matricule_retype" class="form-control" required/>
                                    <br />
                                    <button type="submit" class="btn btn-success">Sauvegarder</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>



           
            </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="bootstrap.min.js"></script>
  </body>
</html>