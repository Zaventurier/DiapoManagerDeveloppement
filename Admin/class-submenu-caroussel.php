<?php
session_start();
/**
 * Fichier permettant l'affichage de la page "Gérer les Caroussels"
 *
 * Fourni les fonctionnalité nécessaire pour le rendu de la page.
 *
 * @since 1.4.1
 * Modifié : -
 */

ini_set('error_log', dirname(__FILE__) . '/debug.log');
//On inclut le fichier qui contient la gestion du header
require_once plugin_dir_path(__FILE__) . '/class-header.php';

class Submenu_Diapo
{
    /**
     * Résumé de render_caroussel_page
     * @return void
     * Cette fonction gère l'affichage du sous menu Gérer les caroussels
     * @since 1.1.3
     * Modification : 1.5.2
     */
    function render_diapo_page()
    {
        error_log('[ChasseAvenir87] > Utilisateur présent sur la page de Gestion des caroussels !');
        // Code pour afficher le contenu de la page "Gérer les caroussels"?>
        <DOCTYPE html>
            <html>
                <head>
                    <!-- Import du CSS de Bootsrap 5.3.0  -->
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
                        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
                    <!-- Import des icônes Bootsrap 1.10.3 -->
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
                </head>
                <body>
                    <?php
                    //Appel de la fonction qui gère le header
                    render_header();
                    if (isset($_POST['diapo'])) {
                        $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
                        $id = isset($_POST['id']) ? $_POST['id'] : '';
                    } else {
                        $nom = "";
                        $id = "";
                    }
                    ?>
                    <hr style="border-top: 2px solid gray;">
                    <div class="row">
                        <div class="col-md-2 text-center" style='border-right:2px solid gray;border-bottom:2px solid gray; height:75vh;background:#efefee;'>
                            <form class="form-floating" action="" method="post">
                                <input name="nomDiapo" type="input" class="form-control" id="floatingInputValue" style="width:100%;margin-top:10px;" value="<?php echo $nom ?>" disabled>
                                <label for="floatingInputValue">Nom du Diaporama</label>
                                <div class="ModifDiapo" style="margin-top:5px;">
                                    <button value="<?php echo $id; ?>" type="submit" name="modifyDiapo" class="btn btn-primary" style="background-color:green;border-color:green;" disabled ><i class="bi bi-pencil-square"></i></button>
                                    <button value="<?php echo $id; ?>" type="submit" name="deleteDiapo" class="btn btn-primary" style="background-color:red; border-color:red;"><i class="bi bi-trash3"></i></button>
                                </div>
                            </form>
                            <?php
                            /**
                             * Vérification : 
                             * Si le champs du nom est null ou vide, alors on affiche un message d'erreur
                             * Sinon, on effectue la suppression
                             */
                            if (isset($_POST['deleteDiapo'])) {
                                if ($_POST['deleteDiapo'] == null) {
                                    echo '<div class="alert alert-danger" role="alert" style="margin-top:10px">Aucun diaporama n\'à été sélectionné !</div>';
                                } else {
                                    //Si le bouton supprimer est cliquer
                                    $idDiapo = $_POST['deleteDiapo'];
                                   deleteDiapo($idDiapo);
                                }
                            }
                            if (isset($_POST['modifyDiapo'])) {
                                if ($_POST['modifyDiapo'] == null) {
                                    echo '<div class="alert alert-danger" role="alert" style="margin-top:10px">La saisit d\'un nom est obigatoire !</div>';
                                }else {
                                //Si le bouton modifier est cliquer
                                $newName = $_POST['nomDiapo'];
                                $idDiapo = $_POST['modifyDiapo'];
                                ModifDiapo($idDiapo, $newName);   
                                }
                            }
                            ?>
                            <hr style="border-top: 2px solid gray;">
                            <div class="AddSlide">
                                <button data-bs-toggle="modal" data-bs-target="#AddSlide" type="submit" name="creer" class="btn btn-outline-secondary"><i class="bi bi-plus-lg"></i>Ajouter un Slide</button>
                            </div>
                            <hr style="border-top: 2px solid gray;">
                            <div class="mb-3">
                                <label class="form-label">Utiliser le shortcode :</label>
                                <input class="form-control" type="text" aria-label="readonly input example" style="height:150px" readonly>
                            </div>
                            <hr style="border-top: 2px solid gray;">
                        </div>
                        <div class="col-md-7 text-center" style='border-bottom:2px solid gray; height: 75vh;'>
                            Affichages de toutes les images présentes dans le diaporama 
                            <?php
                            ?>                
                        </div>
                        <div class="col-md-2 text-center" style='border-left:2px solid gray;border-bottom:2px solid gray;height:75vh;background:#efefee;'>
                            <form class="form-floating" action="" method="post">
                                <input type="input" class="form-control" id="floatingInputValue" style="width:100%;margin-top:10px;" disabled>
                                <label for="floatingInputValue">Nom du Slide</label>
                                <div class="ModifImage" style="margin-top:5px;">
                                    <button type="submit" name="deleteImage" class="btn btn-primary" style="background-color:red; border-color:red;"><i class="bi bi-trash3"></i></button>
                                    <?php
                                        if (isset($_POST['deleteImage'])) {
                                            if ($_POST['deleteImage'] == null) {
                                                echo '<div class="alert alert-danger" role="alert" style="margin-top:10px">Aucune image n\'à été sélectionné !</div>';
                                            } else {
                                                echo '<div class="alert alert-danger" role="alert" style="margin-top:10px">Cette fonctionnalité est actuellement désactivé !</div>';
                                            }
                                        }
                                    ?>  
                                </div>
                            </form>
                            <hr style="border-top: 2px solid gray;">
                            <form class="form-floating" action="" method="post">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                <label for="floatingInputValue">Description</label>
                                <button type="submit" name="modifyDiapo" class="btn btn-primary" style="background-color:green;border-color:green; margin-top:5px;"><i class="bi bi-check2"></i></button>
                            </form>
                            <hr style="border-top: 2px solid gray;">
                        </div>
                    </div>
                    <div class="modal" id="AddSlide" tabindex="-1" aria-labelledby="AddSlide" aria-hidden="true">
                        <div class="modal-dialog" style="margin-top:15%;margin-left:20%;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter un Slide pour <u><?php echo $nom; ?></u></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close">
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post">
                                        <input type="text" name="nomCarousselModif" placeholder="Saisissez un nom " style="margin-bottom:4%;width:50%"></input>
                                        <div class="mb-3">
                                            <label class="form-label">Dépôt d'un fichier</label>
                                            <input class="form-control" type="file" id="formFileDisabled">
                                        </div>
                                        <div class="modal-footer" style="display:block;text-align:center;">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color:red;border-color:red;"><i class="bi bi-x"></i></button>
                                            <button value="<?php echo $id ?>" type="submit" name="Modifier" class="btn btn-primary" style="background-color:green;border-color:green;"><i class="bi bi-check2"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (isset($_POST['Modifier'])) {
                        //NF pour le moment...
                    }

                    ?>
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
                            if (target === "supprimer-diapo") {
                                document.querySelector(target).style.display = 'block';
                            }
                        });
                    });
                </script>
            </html>
            <?php
            if (isset($_POST['SuppDiapo'])) {
                echo '
                <div class="alert alert-info alert-dismissible fade show">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Info!</strong> This alert box could indicate a neutral informative change or action.
              </div>';
            }
                    }
    }

    /**
     * Résumé de deleteDiapo
     * @param int $idDiapo
     * @return void
     * @since 1.5.6
     * 
     */


    function deleteDiapo(int $idDiapo)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'chasseavenircaroussel';
        $wpdb->delete($table_name, array('idCaroussel' => $idDiapo));
        echo '<script type="text/javascript">location.reload();</script>';
    }

    /**
     * Résumé de ModifDiapo
     * @param int $idDiapo
     * @param string $newName
     * @return void
     */


    function ModifDiapo(int $idDiapo, string $newName)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'chasseavenircaroussel';
        $wpdb->update($table_name, array('idCaroussel' => $idDiapo), array('nomCaroussel' => $newName));
        //echo '<script type="text/javascript">location.reload();</script>';
    }



    /**
     * Résumé de AddSlide
     * @return void
     * @since 1.5.6
     * @param null
     * Modifié : -
     * Permet d'ajouter une slide
     */
    function AddSlide()
    {

    }

    /**
     * Résumé de getAllSlide
     * @return void
     * @since 1.5.6
     * @param $idDiapo
     * Modifié : -
     * Permet d'afficher toutes les slides d'un diaporama donnée
     */
    function getAllSlide(int $idDiapo)
    {

    }



    /**
     * Résumé de DeleteSlide
     * @param int $idDiapo 
     * @param int $idSlide
     * @return void
     * @since 1.5.6
     * Modifié : -
     * Permet de supprimer une slide d'une dispo définie
     */
    function DeleteSlide(int $idDiapo, int $idSlide)
    {

    }

    /**
     * Résumé de ModifSlide
     * @param int $idDiapo
     * @param int $idSlide
     * @return void
     * @since 1.5.6
     * Modifié : -
     * Permet de modifier une slide d'une dispo définie
     */
    function ModifSlide(int $idDiapo, int $idSlide)
    {

    }
?>