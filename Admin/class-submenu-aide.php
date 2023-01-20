<?php
/**
 * Fichier permettant l'affichage de la page "Aide"
 *
 * Fourni les fonctionnalité nécessaire pour le rendu de la page.
 *
 * @since 1.4.1
 * Modifié : -
 */
 //error_log('');
 ini_set('error_log', dirname(__FILE__) . './debug.log');

 class Submenu_Aide {
      /**
   * Résumé de render_aide_page
   * @return void
   * Cette fonction gère l'affichage du sous menu Aide
   * @since 1.1.3
   * Modification : 1.4.1
   */
    public function render_aide_page(){
        error_log('[ChasseAvenir87] > Utilisateur présent sur la page d\'aide !');
        // Code pour afficher le contenu de la page "Aide"?>
        <DOCTYPE html>
            <html lang="fr">
                <head>
                    <style>
                        /**
                        * Code CSS pour gérer la page
                        */
                    </style>
                </head>
                <body>
                    <h1>Aide</h1>
                    <p>Un problème ? Un soucis ? Vous avez peut être la réponse à vos questions ici !</p>
                </body>
                <script>
                    /**
                     * Potentiel script JavaScript pour la page
                     */
                </script>
            </html>
        <?php
    }

 }
 ?>