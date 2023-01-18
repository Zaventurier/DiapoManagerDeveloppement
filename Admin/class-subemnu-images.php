<?php
/**
 * Fichier permettant l'affichage de la page "Gérer les Images"
 *
 * Fourni les fonctionnalité nécessaire pour le rendu de la page.
 *
 * @since 1.4.1
 * Modifié : -
 */

 class Submenu_Images {
/**
 * Résumé de render_images_page
 * @return void
 * Cette fonction gère l'affichage du sous menu Gérer les Images
 * @since 1.1.3
 * Modification : 1.4.1
 */
    public function render_images_page() {
        // Code pour afficher le contenu de la page "Gérer les images"?>
        <!DOCTYPE html>
            <html lang="fr">
                <head>
                    <style>
                        /**
                        * Code CSS nécessaire à la page à inclure ici
                        */
                    </style>
                </head>
                <body>
                    <h1>Gérer les images</h1>
                    <p>Ici, vous pouvez ajouter, supprimer ou modifier des images.</p>
                    <div class="AllImages">
                        <?php
                        $images = $this->getAllImages();
                        foreach($images as $image){?>
                        
    
                        <?php
                    }
                    ?>
                    </div>
                </body>
                <script>
                    /**
                    * Inclure le potentiel script JavaScript nécessaire au fonctionnement de la page
                    */
                </script>
            </html>
        <?php
    }
    /**
 * Ces fonctions sont nécessaires au fonctionnement de la page "Gérer les images"
 * Fonction render_images_page()
 * @since 1.3
 * Modifié : -
 */

  /**
   * Résumé de getAllImages
   * @return mixed
   * @since 1.3 - 17 Janvier 2023
   * Modifié : -
   * Récupère et renvoie l'id le nom et le chemin de l'image dans le but de les afficher sous forme de tableau assiocatif
   */

function getAllImages(){
    global $wpdb;
    $images = $wpdb->get_results( "SELECT ID, nomImage, cheminImage FROM {$wpdb->prefix}chasseavenirimage", ARRAY_A );
    return $images;
}

  /**
   * Résumé getAllImageById
   * @return mixed
   * @param $unId
   * @since 1.3 - 17 Janvier 2023 
   * Modifié : -
   * Récupère et renvoie un tableau de toutes les informations de chaque image dans un tableau associatif en fonction de l'id de l'image.
   */

function getAllImageById($UnId){
    global $wpdb;
    $AllInfImages = $wpdb->get_results( "SELECT nomImage, cheminImage, DescriptionImage, extensionImages, poidsImage, dateAjout FROM {$wpdb->prefix}chasseavenirimage WHERE idImage = $UnId", ARRAY_A );
    return $AllInfImages;
}
    
 }