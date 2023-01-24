<?php
/**
 * Fichier permettant l'affichage de la page "Gérer les Caroussels"
 *
 * Fourni les fonctionnalité nécessaire pour le rendu de la page.
 *
 * @since 1.4.1
 * Modifié : -
 */
//error_log('');
ini_set('error_log', dirname(__FILE__) . '/debug.log');

//wp_enqueue_script( 'bootstrap-js', plugins_url( 'js/bootstrap.min.js', __DIR__ ), array( 'jquery' ), null, true );

//wp_enqueue_style( 'bootstrap-css',plugins_url( 'css/bootstrap.min.css', __DIR__ ) );
    

class Submenu_Caroussel
{
            
    
    /**
     * Résumé de render_caroussel_page
     * @return void
     * Cette fonction gère l'affichage du sous menu Gérer les caroussels
     * @since 1.1.3
     * Modification : 1.4.1.
     */
    function render_caroussel_page()
    {
        error_log('[ChasseAvenir87] > Utilisateur présent sur la page de Gestion des caroussels !');
        // Code pour afficher le contenu de la page "Gérer les caroussels"?>
        <DOCTYPE html>
            <html>
            <head>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
            <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
                <style>
                    .entete {
                        background-color: beige;
                        width: 100%;
                        height: auto;
                        text-align: left;
                        padding: 10px;
                        font-size: medium;
                        text-align: center;
                        margin-bottom: 20px;
                        position: fixed;
                    }

                    .btn:hover {
                        opacity: 0.6;
                    }
                </style>
            </head>

            <body>
            <div>
                <div>
                    <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter un nouveau diaporama</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h5>Saisissez un nom pour votre diaporama :</h5>
                                    <form method="post">
                                        <input type= "text" name="nomCaroussel"></input>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                            <button type="submit" name="Valider" class="btn btn-primary">Valider</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal" id="data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-fullscreen-xxl-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modifier le diaporama</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h5>Saisissez un nom pour votre diaporama :</h5>
                                    <form method="post">
                                        <input type= "text" name="nomCaroussel"></input>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                            <button type="submit" name="Valider" class="btn btn-primary">Valider</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 text-center" style='background:rgb(250, 250, 188); '>
                        <div>
                            <button  data-bs-toggle="modal" data-bs-target="#exampleModal" type="submit" name="creer" class="btn" style="border:none;border-radius:initial;background:rgb(250, 250, 188);;;cursor:pointer;font-family: Helvetica;">
                                <img src="images/add.svg"><br />
                                Ajouter un caroussel
                            </button>
                        </div>
                    </div><?php
                        $AllCaroussel = $this->getAllCaroussel();
                        foreach ($AllCaroussel as $unCaroussel) {
                            ?>
                            <div class='col-md-1 text-center' style='background:rgb(250, 250, 188); border:1px dashed white;'>
                                <button  data-bs-toggle="modal" data-bs-target="#data" type="submit" name="creer" class="btn" style="border:none;border-radius:initial;background:rgb(250, 250, 188);;;cursor:pointer;font-family: Helvetica;"><?php echo $unCaroussel['nomCaroussel'];?></button><?php
                                //echo "<button type='button' class='btn btn-outline-primary'>Modifier</button>";
                                ?>
                            </div>
                            <?php
                        }?>
            </div>
            </body>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
                <?php
                if (isset($_POST['Valider'])) {
                    $unNom = $_POST['nomCaroussel'];
                    $data = array(
                        'idCaroussel' => null,
                        'nomCaroussel' => $unNom
                    );
                    $this->Creer_Caroussel($data);
                }?>
            </html>
<?php
    }


    /**
     * Résumé de Create_Caroussel
     * @return void
     * @param Array $nom
     * Créer un caroussel dans la base de données avec le nom donné par l'utilisateur
     * @since 1.5.1
     * Modifié : -
     */

    function Creer_Caroussel(array $array){
        error_log('Create_Caroussel > Fonction appellé avec succès !');
        global $wpdb;
        if ($array['nomCaroussel'] == null) {
            error_log('L\'insertion n\'a pu être exécuté car le champ "nomCaroussel" est vide !');
            $this->alertNull();
            exit;
        }else{
            $result = $wpdb->insert($wpdb->prefix . "chasseavenircaroussel", $array);
            if (!$result) {
                error_log('Create_Caroussel > Une erreur est survenu lors de l\'insertion dans la base de données : ' .$wpdb->print_error());
                $wpdb->print_error();
            }else{
            error_log('Create_Caroussel > Insertion effectué avec succès !');
            //wp_redirect( $_SERVER['REQUEST_URI']);
            //exit;
            }
            exit;
        } 
    }


    function alertNull(){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Erreur > </strong>Le champs "nomCaroussel" ne peut être null !
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    

      /**
       * Résumé de getAllCaroussel
       * @return mixed
       * @since 1.5.0
       * 
       */

    function getAllCaroussel(){
        error_log('getAllCaroussel > Fonction appellé avec succès !');
        global $wpdb;
        $AllCaroussel = $wpdb->get_results( "SELECT * FROM " . $wpdb->prefix . "chasseavenircaroussel", ARRAY_A );
        return $AllCaroussel;
        }

}
?>