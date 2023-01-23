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

 //error_log('');
ini_set('error_log', dirname(__FILE__) . '/debug.log');
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
private $submenu_aide;
//Pour le sous menu Gérer les Images
private $submenu_images;
//Pour le sous menu Gérer les caroussels
private $submenu_caroussel;
//Pour la maintenance des pages
private $maintenance;


 
 /**
 * Initializer toutes les classes.
 *
 * @param Submenu_Page $submenu_page A reference to the class that renders the
 * page for the plugin.
 */
public function __construct( $submenu_page /*$submenu_aide*/ ) {
    $this->submenu_page = $submenu_page;
    $this->submenu_aide = new Submenu_Aide();
    $this->submenu_images = new Submenu_Images();
    $this->submenu_caroussel = new Submenu_Caroussel();
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
 * Modifié : 1.4.1
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
        array( $this->submenu_aide, 'render_aide_page' )
        );
    // Ajout du sous-menu "Gérer les images"
    add_submenu_page( 
        'administrator-page', 
        'Page indisponible',//Gérer les images 
        'Gérer les images', 
        'manage_options', 
        'chasseavenir-images', 
        array( $this->submenu_images, 'render_images_page' )//
    );
    //Ajout du sous-menu "Gérer les Caroussels"
    add_submenu_page(
        'administrator-page',
        'Gérer les caroussels',
        'Gérer les caroussels',
        'manage_options',
        'chasseavenir-caroussel',
        array( $this->submenu_caroussel, 'render_caroussel_page' )
        );
}
}
?>