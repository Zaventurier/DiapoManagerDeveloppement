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
     * Modification : 1.5.2
     */
    function render_caroussel_page()
    {
        error_log('[ChasseAvenir87] > Utilisateur présent sur la page de Gestion des caroussels !');
        // Code pour afficher le contenu de la page "Gérer les caroussels"?>
        <DOCTYPE html>
            <html>
            <head>
            <!-- Import du CSS de Bootsrap 5.3.0  -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
            <!-- Import des icônes Bootsrap 1.10.3 -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
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
                    <!-- Modification du diaporama : Ajout d'images et Modification des informations -->
                    <!-- Début de la Pop-Up de moficiation de chaque diaporama -->
                    <div class="modal" id="data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    
                    
                    
                    
                    
                    
                    
                    <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <!-- Début de la bare de navigation -->
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Acceuil</button>
                                            <button class="nav-link" id="nav-diapo-tab" data-bs-toggle="tab" data-bs-target="#nav-diapo" type="button" role="tab" aria-controls="nav-diapo" aria-selected="false">Diaporama</button>
                                            <button class="nav-link" id="nav-images-tab" data-bs-toggle="tab" data-bs-target="#nav-images" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Images</button>
                                            <button class="nav-link" id="nav-supprimer-tab" data-bs-toggle="tab" data-bs-target="#nav-supprimer" type="button" role="tab" aria-controls="nav-disabled" aria-selected="false" disabled>Supprimer</button>
                                        </div>
                                    </nav>
                                    <!-- Fin de la barre de navigation -->
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <!-- Fin du Header -->
                                <!-- Début du corps de la Pop-Up -->
                                <div class="modal-body">
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                                        <?php error_log('[Gestion des Caroussels] > Menu Acceuil ouvert avec succés !');?>
                                        <span class="badge text-bg-warning">En développement...</span>
                                            
                                        </div>
                                        <div class="tab-pane fade" id="nav-diapo" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                                        <?php error_log('[Gestion des Caroussels] > Menu Diapo ouvert avec succés !');?>
                                        <span class="badge text-bg-warning">En développement...</span>
                                            
                                        </div>
                                        <div class="tab-pane fade" id="nav-images" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
                                        <?php error_log('[Gestion des Caroussels] > Menu Images ouvert avec succés !');?>
                                        <span class="badge text-bg-warning">En développement...</span>
                                            
                                        </div>
                                        <div class="tab-pane fade" id="nav-supprimer" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">
                                        <?php error_log('[Gestion des Caroussels] > Menu Supprimer ouvert avec succés !');?>
                                        <span class="badge text-bg-warning">En développement...</span>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                    <button type="submit" name="Valider" class="btn btn-primary" disabled data-bs-toggle="button">Valider</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1 text-center" style='background:rgb(250, 250, 188); '>
                    <div>
                        <button  data-bs-toggle="modal" data-bs-target="#exampleModal" type="submit" name="creer" class="btn" style="border:none;border-radius:initial;background:rgb(250, 250, 188);;;cursor:pointer;font-family: Helvetica;">
                            <i class="bi bi-plus-square"></i><br />
                            Créer
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
            <!-- Import du JS de Bootsrap 5.3.0  -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
                    document.querySelectorAll('.nav-link').forEach(link => {
                        link.addEventListener('click', (e) => {
                            e.preventDefault();
                            const target = e.target.getAttribute('data-target');
                            document.querySelectorAll('.content').forEach(content => {
                                content.style.display = 'none';
                            });
                            if(target === "supprimer-diapo"){
                                document.querySelector(target).style.display = 'block';
                            }
                        });
                    });
                </script>
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
     * @param array $nom
     * Créer un caroussel dans la base de données avec le nom donné par l'utilisateur
     * @since 1.5.1
     * Modifié : 1.5.2
     */

    function Creer_Caroussel(array $array){
        error_log('Create_Caroussel > Fonction appellé avec succès !');
        global $wpdb;
        if ($array['nomCaroussel'] == null) {
            error_log('L\'insertion n\'a pu être exécuté car le champ "nomCaroussel" est vide !');
            //Appel de la fonction alert en rentrant le numéro de l'erreur.
            $this->alert(1);
            exit;
        }else{
            $result = $wpdb->insert($wpdb->prefix . "chasseavenircaroussel", $array);
            if (!$result) {
                error_log('Create_Caroussel > Une erreur est survenu lors de l\'insertion dans la base de données : ' .$wpdb->print_error());
                $wpdb->print_error();
            }else{
            error_log('Create_Caroussel > Insertion effectué avec succès !');
            echo '<script type="text/javascript">location.reload();</script>';
            exit;
            }
            exit;
        } 
    }

      /**
       * Résumé de alertNull
       * @return void
       * @since 1.5.1
       * @param int $nbr
       * Modifié : 1.5.2 
       * Fonction permettant de gérer toutes les alertes en fonction d'un chiffre définit
       */

    function alert(int $nbr){
        if($nbr == 1){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Erreur > </strong>Le champ "nomCaroussel" ne peut être null !
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            exit;
        }
    }
    

      /**
       * Résumé de getAllCaroussel
       * @return mixed
       * @since 1.5.0
       * Modifié : -
       */

    function getAllCaroussel(){
        error_log('getAllCaroussel > Fonction appellé avec succès !');
        global $wpdb;
        $AllCaroussel = $wpdb->get_results( "SELECT * FROM " . $wpdb->prefix . "chasseavenircaroussel", ARRAY_A );
        return $AllCaroussel;
        }

}
?>