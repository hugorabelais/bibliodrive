

        <div class="container-fluid">
                <div class="row" >
                          <div class="col-sm-12">
                                    <?php
                              require_once("barre_recherche.php")
                                    ?>
                          </div>
                </div>
                <div class="row">
                      <div class="col-sm-6">
                          <?php
                            $reponse = $_GET["idlivre"];
                            require_once('connexion.php');
                            $stmt = $connexion ->prepare("SELECT * from livre inner join auteur on (livre.noauteur=auteur.noauteur) where nolivre=:pnumero" )	;
                            $stmt->bindValue(":pnumero", $reponse);
                            $stmt->setFetchMode(PDO::FETCH_OBJ);
                            $stmt->execute();
                            $livre = $stmt->fetch(); 
                            $_SESSION['TitreLivre'] = $livre->titre;
                                $_SESSION['PrenomAuteur'] = $livre->prenom;
                                $_SESSION['NomAuteur'] = $livre->nom;
                                $_SESSION['isbnLivre'] = $livre->isbn13;
                                $_SESSION['DetailLivre'] = $livre->detail;
                                $_SESSION['PhotoLivre'] = $livre->photo;
                                $_SESSION['nolivre'] = $livre->nolivre;
                                $_SESSION['anneeparution'] = $livre->anneeparution;
                            echo "<b>Auteur : ".$livre->nom. " ". $livre->prenom."</br></b>" ;
                            echo "<b>ISBN13 : ".$livre->isbn13."</br></b>";
                            echo "<b>Résumer du livre</br></br></br></b>";
                            echo "<b>".$livre->detail."</br></br></br></b>";
                        $stmt = $connexion->prepare("SELECT * FROM emprunter where emprunter.nolivre = :nolivre order by dateemprunt desc");
                        $stmt->bindValue(":nolivre", $reponse); 
                        $stmt->setFetchMode(PDO::PARAM_INT);
                        $stmt->execute();
                        $dispo = $stmt->fetch();
                        if (($_SESSION['profil'] == "" && ($dispo && $dispo->dateretour != NULL )) || ($_SESSION['profil'] == "")&&(!$dispo)){
                                echo '<b class="text-success">disponible</b>
                                <b class="text-danger"> vous devez être connecté pour réservez</b>
                                ';
                        }
                        elseif (($_SESSION['profil'] == "" && $dispo && $dispo->dateretour == NULL ) || ($_SESSION['profil'] == "")&&(!$dispo)) {
                                 echo '<b class="text-danger">indisponible</b>
                                <b class="text-danger"> vous devez être connecté pour réservez</b>
                                ';
                        }
                                    if (($_SESSION['profil'] == "client" && $dispo && $dispo->dateretour != NULL ) || ($_SESSION['profil'] == "client")&&(!$dispo)){
                echo '<div>
                            DISPONIBLE    
                            <form action="" method="post" >
                            <input type="submit" class="btn btn-outline-success" name="btnPanier" value="Ajouter au panier" >
                        </form>
                      </div>
                      ';      
                $dansLePanier = False;
                for($x = 0; $x < count($_SESSION['panier']); $x++){
                        if ($_SESSION['panier'][$x] == $_SESSION['TitreLivre']){
                            $dansLePanier = True;
                        }
                            
                    }

                if (isset($_POST['btnPanier']) && $dansLePanier == False && (count($_SESSION['panier'])<6)){

                    $_SESSION['panier'][] = array($_SESSION['nolivre'] ,$_SESSION['PrenomAuteur'], $_SESSION['NomAuteur'], $_SESSION['TitreLivre'], $_SESSION['anneeparution']);
                    echo 'Livre ajouté au panier !';
                    
                }
                elseif (isset($_POST['btnPanier']) && $dansLePanier == True) {
                        echo 'Le livre est déjà dans le panier !';
                }
                elseif (isset($_POST['btnPanier']) && count($_SESSION['panier'])>5) {
                        echo 'Le panier est plein, vous ne pouvez plus y ajouter de livre !';
                }
                
                         
            }
            elseif (($_SESSION['profil'] == "client" && $dispo && $dispo->dateretour == NULL ) || ($_SESSION['profil'] == "client")&&(!$dispo)) {
                echo '<div>
                            indisponible
                      </div>
                          ';
            }
                        echo "</div>";
                        echo "<div class='col-sm-3'>";
                        echo "<img src='images/". $livre->photo. "' alt='image livre' height='400' width='300'>" ;
                        echo "</div>";
                            ?>

                      <div class="col-sm-3" >
                              <?php
                                require_once("form_connexion.php")
                              ?>
                      </div>
                </div>
        </div>
</body>
</html>