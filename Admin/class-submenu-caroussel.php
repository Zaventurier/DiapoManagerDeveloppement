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
                    <style>
                        
                    </style>


                </head>
                <body>
                    <?php
                    //Appel de la fonction qui gère le header
                    render_header();
                    ?>
                    <hr style="border-top: 2px solid gray;">
                    <div class="row">
                        <div class="col-md-2 text-center" style='border-right:2px solid gray; height:75vh;background:#efefee;'>
                            <form class="form-floating" action="" method="post">
                                <input type="input" class="form-control" id="floatingInputValue" style="width:100%;margin-top:10px;" disabled>
                                <label for="floatingInputValue">Nom du Diaporama</label>
                                <div class="Modif" style="margin-top:5px;">
                                    <button type="submit" name="modify" class="btn btn-primary" style="background-color:green;border-color:green;"><i class="bi bi-pencil-square"></i></button>
                                    <button type="submit" name="delete" class="btn btn-primary" style="background-color:red; border-color:red;"><i class="bi bi-trash3"></i></button>
                                </div>
                            </form>
                            <hr style="border-top: 2px solid gray;">
                            <form class="form-floating" action="" method="post">
                                <button type="submit" name="AddImage" class="btn btn-outline-secondary"><i class="bi bi-plus-lg"></i>Ajouter une Slide</button>
                            </form>
                            <hr style="border-top: 2px solid gray;">
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Utiliser le shortcode :</label>
                                <input class="form-control" type="text" aria-label="readonly input example" style="height:150px" readonly>
                            </div>
                            <hr style="border-top: 2px solid gray;">
                        </div>
                        <div class="col-md-9 text-center" style='border:none;border-left:none; height: 75vh;'>
                    
                        </div>
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
                            if (target === "supprimer-diapo") {
                                document.querySelector(target).style.display = 'block';
                            }
                        });
                    });
                </script>
            </html>
            <?php
            if(isset($_POST['SuppDiapo'])) {
                echo '
                <div class="alert alert-info alert-dismissible fade show">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Info!</strong> This alert box could indicate a neutral informative change or action.
              </div>';
            }
    }
}

/**
 * Résumé de getAllCaroussel
 * @return mixed
 * @since 1.5.0
 * Modifié : -
 */

function getAllCaroussel()
{
    error_log('getAllCaroussel > Fonction appellé avec succès !');
    global $wpdb;
    $AllCaroussel = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "chasseavenircaroussel", ARRAY_A);
    return $AllCaroussel;
}
?>