<?php
/**
 * Fichier permettant l'affichage de la page "Info"
 *
 * Fourni les fonctionnalité nécessaire pour le rendu de la page.
 *
 * @since 1.4.1
 * Modifié : 1.5.12
 */
 //error_log('');
 ini_set('error_log', dirname(__FILE__) . './debug.log');

 class Submenu_Aide {
      /**
   * Résumé de render_aide_page
   * @return void
   * Cette fonction gère l'affichage du sous menu Aide
   * @since 1.1.3
   * Modification : 1.5.13
   */
    public function render_aide_page(){
        error_log('[ChasseAvenir87] > Utilisateur présent sur la page d\'info !');
        // Code pour afficher le contenu de la page "Aide"?>
        <DOCTYPE html>
            <html lang="fr">
                <head>
                     <!-- Import du CSS de Bootsrap 5.3.0  -->
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
                    <!-- Import des icônes Bootsrap 1.10.3 -->
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
                    <style>
                            
                    </style>
                </head>
                <body>
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <p class="card-text">Plugin Version : 1.5.13<br/>Dernière mise à jour : 01/02/2023 - 17h</p>
                        </div>
                    </div>
                    <div class="card" style="width: 18rem;">
                        <img src="bootstrap-logo.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Framework Utilisés :</h5>
                            <p class="card-text">Boostrap 5.3.0</p>
                            <a href="https://blog.getbootstrap.com" class="btn btn-primary">En savoir plus</a>
                        </div>
                    </div>
                </body>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
            </html>
        <?php
    }

 }
 ?>