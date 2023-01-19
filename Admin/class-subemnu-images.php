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
                        .UneImage {
                            border: 2px solid yellow;
                            width: 2%;
                            padding: 50px;
                            display:flex;
                            flex-direction: column;
                            margin-top: 9px;
                        }
                    </style>
                </head>
                <body>
                    <h1>Gérer les images</h1>
                    <p>Ici, vous pouvez ajouter, supprimer ou modifier des images.</p>
                    <div class="AllImages">
                        <?php
                        $images = $this->getAllImages();
                        //onclick="displayImageInfo(<?php echo json_encode($image);
                        //style="background-image:url(<?php echo $image->cheminImage;
                        foreach($images as $image){
                             ?>
                                <div class="UneImage">
                                    <img src="<?php echo $image->guid; ?>">
                                </div>
                            <?php
                    }
                    ?>
                    </div>
                </body>
                <script>
                    
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
   * Modifié : 1.4.2
   * Récupère et renvoie l'id le nom et le chemin de l'image dans le but de les afficher sous forme de tableau assiocatif
   */

function getAllImages(){
    global $wpdb;
    $images = $wpdb->get_results("SELECT * FROM v_photochasseavenir");
    return $images;
}
/**
 * function insertImage(array $array){
   *     global $wpdb;
    *    $result = $wpdb->insert($wpdb->prefix . "chasseavenirimage", $array);
     *   if (!$result) {
      *      $wpdb->print_error();
       * }else{
        *    echo "insertion réussi !";
        *}
    *}
 */

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
    $AllInfImages = $wpdb->get_results( "SELECT * FROM  v_photochasseavenir WHERE idImage = $UnId", ARRAY_A );
    return $AllInfImages;
}
    
 }
 ?>