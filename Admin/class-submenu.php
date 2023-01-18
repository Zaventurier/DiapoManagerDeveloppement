<?php
/**
 * Création des sous menus pour le plugin
 *
 * @package Custom_Admin_Settings
 */
 
/**
 * Créer un sous menu pour le menu.
 *
 * Enregistre un menu sous le menu "Outils".
 *
 * @package Custom_Admin_Settings
 */
class Submenu {



    /**
     * Cette class gère le menu et les sous-menu
     * C'est ici que son gérer l'affichage des différents sous-menu
     */
 
 /**
 * A reference the class responsible for rendering the submenu page.
 *
 * @var Submenu_Page
 * @access private
 */

 /**
  * Variables privées
  * @var mixed
  */

//Pour la page ChasseAvenir87
private $submenu_page;
//Pour le sous menu Aide
//private $submenu_aide;

 
 /**
 * Initializer toutes les classes.
 *
 * @param Submenu_Page $submenu_page A reference to the class that renders the
 * page for the plugin.
 */
public function __construct( $submenu_page /*$submenu_aide*/ ) {
$this->submenu_page = $submenu_page;
//$this->submenu_aide = $submenu_aide;
 }
 
 /**
 * Ajoute un sous menu dans le menu outils.
 */
 public function init() {
 add_action( 'admin_menu', array( $this, 'add_options_page' ) );
 }
 
/**
 * Résumé de add_options_page
 * @return void
 * Cette fonction gère le menu qui s'affiche sur le tableau de bord WordPress
 * @since 1.1.0
 * Modifié : 1.3
 */
public function add_options_page() {
    add_menu_page(
        'ChasseAvenir87', //titre de la page d'options qui sera affiché en haut de l'écran dans le menu d'administration de WordPress.
        'ChasseAvenir87', //nom qui apparaîtra dans le menu d'administration de WordPress.
        'manage_options',//niveau de permission requis pour accéder à cette page d'options.
        'administrator-page', //l'identifiant unique de la page d'options qui sera utilisé pour construire l'URL de la page.
        array( $this->submenu_page, 'render' ),//méthode de la classe qui est utilisée pour afficher le contenu de la page d'options.
       'dashicons-format-gallery',//l'icône qui apparaîtra à côté du nom de la page dans le menu d'administration de WordPress.
       100//rang de la page dans le menu d'administration de WordPress (plus le nombre est élevé, plus tard dans le menu la page apparaîtra).
    );
    // Ajout du sous-menu "Aide"
    add_submenu_page(
        'administrator-page',
        'Aide',
        'Aide',
        'manage_options',
        'chasseavenir-aide',
        array( $this, 'render_aide_page')
        );
    // Ajout du sous-menu "Gérer les images"
    add_submenu_page( 
        'administrator-page', 
        'Gérer les images', 
        'Gérer les images', 
        'manage_options', 
        'chasseavenir-images', 
        array( $this, 'render_images_page' ) 
    );
    //Ajout du sous-menu "Gérer les Caroussels"
    add_submenu_page(
        'administrator-page',
        'Gérer les caroussels',
        'Gérer les caroussels',
        'manage_options',
        'chasseavenir-caroussel',
        array($this, 'render_caroussel_page')
        );
}

  /**
   * Résumé de render_aide_page
   * @return void
   * Cette fonction gère l'affichage du sous menu Aide
   * @since 1.1.3
   * Modification : 1.1.3
   */

public function render_aide_page(){
    // Code pour afficher le contenu de la page "Aide"?>
    <h1>Aide</h1>
    <p>Un problème ? Un soucis ? Vous avez peut être la réponse à vos questions ici !</p>
    <?php
}

/**
 * Résumé de render_images_page
 * @return void
 * Cette fonction gère l'affichage du sous menu Gérer les Images
 * @since 1.1.3
 * Modification : 1.3
 */
public function render_images_page() {
    // Code pour afficher le contenu de la page "Gérer les images"?>
    <h1>Gérer les images</h1>
    <p>Ici, vous pouvez ajouter, supprimer ou modifier des images.</p>


    <?php
}

  /**
   * Résumé de render_caroussel_page
   * @return void
   * Cette fonction gère l'affichage du sous menu Gérer les caroussels
   * @since 1.1.3
   * Modification : -
   */

public function render_caroussel_page(){
    // Code pour afficher le contenu de la page "Gérer les caroussels"
        echo '<h1>Gérer les caroussel</h1>';
        echo '<p>Actuellement en cours de développement !</p>';
}



/**
 * Fonction nécessaire au fonctionnement de chaque page
 * @since 1.3 - 17 Janvier 2023
 * Modifié : - 
 * @author PASCAIL Guillaume
 */








  /**
   * Résumé de getAllImages
   * @return mixed
   * @since 1.3 - 17 Janvier 2023
   * Modifié : -
   * Récupère et renvoie l'id le nom et le chemin de l'image dans le but de les afficher soud forme de tableau assiocatifs
   */

   public function getAllImages(){
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

   public function getAllImageById(int $UnId){
    global $wpdb;
    $AllInfImages = $wpdb->get_results( "SELECT nomImage, cheminImage, DescriptionImage, extensionImages, poidsImage, dateAjout FROM {$wpdb->prefix}chasseavenirimage WHERE idImage = $UnId", ARRAY_A );
    return $AllInfImages;
}

}