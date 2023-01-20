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

 class Submenu_Caroussel {
      /**
   * Résumé de render_caroussel_page
   * @return void
   * Cette fonction gère l'affichage du sous menu Gérer les caroussels
   * @since 1.1.3
   * Modification : 1.4.1.
   */
    public function render_caroussel_page(){
        error_log('[ChasseAvenir87] > Utilisateur présent sur la page de Gestion des caroussels !');
        // Code pour afficher le contenu de la page "Gérer les caroussels"?>
        <DOCTYPE html>
            <html>
                <head>
                    <style>
                        .entete{
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
                        .link{
                            position: relative;
                            display: inline-block;
                            text-decoration: none;
                            color: #fff;
                            padding-left: 30px;
                            padding-right: 30px;
                            }
                        .link::before, .link::after{
                            content: '';
                            position: absolute;
                            left: 0;
                            width: 100%;
                            height: 2px;
                            background-color: #e65454;
                            transform: scaleX(0);
                            transition: transform .25s;
                            }
                        .link::before{
                            top: -3px;
                            transform-origin: left;
                            }
                        .link::after{
                            bottom: -3px;
                            transform-origin: right;
                            }
                        .link:hover::before, .link:hover::after{
                            transform: scaleX(1);
                            }
                        .btn:hover {
                            opacity: 0.6;
                            }
                    </style>
                </head>
                </body>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="entete" id="home">
                        <button type="submit" name="creer" class="btn" style="border:none;background:beige;cursor:pointer;font-family: Helvetica;">
                            <img src="images/add.svg"><br/>
                            Ajouter un caroussel
                        </button>
                    </div>  
                </form>                  
                </body>
                <script>
                    /**
                     * Potentiel script JavaScript pour la page
                     */
                </script>
            </html>
        <?php
        if (isset($_POST['creer'])) {
            $this->Create_Caroussel();
        }
    }


  /**
   * Résumé de Create_Caroussel
   * @return void
   * @param String $name
   * Créer un caroussel dans la base de données avec le nom donné par l'utilisateur
   * @since 1.5.1
   * Modifié : -
   */

function Create_Caroussel(String $name){
    error_log('Create_Caroussel : Fonction appellé correctement !');
}
    
 }
 ?>