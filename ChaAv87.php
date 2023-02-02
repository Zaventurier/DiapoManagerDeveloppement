<?php
/**
 * Fichier de démarrage
 *
 * Ceci est le fichier principal qui sera lu par WordPress.
 *
 *
 * @wordpress-plugin
 * Plugin Name: ChasseAvenir87
 * Plugin URI: 
 * Description: Gérer des diaporamas n'à jamais été aussi simple ! Créer un diaporama, gérer les images et les descriptions que vous voulez et publiez les sur votre site via un shortcode ! Ce plugin est encore en version de développement et peut engranger des erreurs ! Nous vous conseillons de désactiver le débogage sur votre site pour éviter les failles de sécurités ! Le plugin reçoit 2 mises à jours régulières qui ajoute de nouvelles fonctionalités ainsi que des Patchs de bugs qui gênent le fonctionnement de celui-ci !
 * Author: Guillaume Pascail
 * Version: 1.6.1 - 02/02/2023
 * Author URI: 
 * License: 
 * License URI: 
 */

 //Fichiers requis
 require_once( ABSPATH . 'wp-includes/shortcodes.php' );
 require_once plugin_dir_path(__FILE__) . 'inc/ChAv-functions.php';
 
 if ( ! defined( 'ABSPATH' ) ) {
     die;
 }
 
 //error_log('');
 ini_set('error_log', dirname(__FILE__) . '/debug.log');
 //ini_set('error_log', dirname(__FILE__) . '/Admin/logs/debug.log');
 
 /**
  * Appel des fonctions qui vont s'éxécuter à l'activation du plugin
  * @since 1.1.2
  * Modifié : 1.6.0
  * Remarque : __FILE__ signifie que la fonction est présente dans le fichier.
  */

 //register_activation_hook(__FILE__,'Prepare_To_Run');//On appelle la fonction Prepare_To_Run contenu dans ce fichier.
 register_activation_hook(__FILE__, 'Create_Caroussel');//On appelle la fonction Create_Caroussel contenu dans ce fichier.
 register_activation_hook(__FILE__, 'Create_Slide');//Appel de la fonction Create_Slide contenu dans ce fichier.
 

/**
 * Résumé de Prepare_To_Run
 * @return void
 * Fonction qui vérifie si il y à une table nommé ChasseAvenir87.
 * Si une table portant ce nom est déjà existante, alors la fonction ne fera rien.
 * Cette fonction ne gère pas les différentes erreurs qui pourrait être occasionnés.
 * Remarque : la table n'est pas relié au reste de la base de données et les images sont gérés de façon indépendantes du reste du site
 * @since 1.1.2
 * Modifié : 1.1.4
 */
function Prepare_To_Run() {
    global $wpdb;
    //Ici, on inclut le préfixe des tables WordPress au nom saisit. On va donc vérifier si il y à une table wp_ChasseAvenir87
    //Si elle n'existe pas, on va donc la créer.
    $table_name = $wpdb->prefix . "chasseavenirImage";
    $charset_collate = $wpdb->get_charset_collate();
    error_log('Fonction Prepare_To_Run : Fonction correctement appellé !');
    if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        error_log('Fonction Prepare_To_Run : Préparation de la requête !');
        $sql = "CREATE TABLE $table_name (
            idImage mediumint(11) NOT NULL AUTO_INCREMENT,
            cheminImage varchar(100) NOT NULL,
            nomImage varchar(255) NOT NULL,
            DescriptionImage text NULL,
            extensionImage varchar(10) NOT NULL,
            poidsImage varchar (15) NOT NULL,
            dateAjout datetime NOT NULL,
            estSupprime boolean NOT NULL DEFAULT 0,
            dateSuppression datetime NULL,
            mediaLibraryId mediumint(11) NOT NULL,
            PRIMARY KEY (idImage),
            FOREIGN KEY (mediaLibraryId) REFERENCES wp_posts(ID)
            ) $charset_collate;";
        error_log('Fonction Prepare_To_Run : Requête préparé avec succés !');
        //Cette fonction necessite l'utilisation d'un fichier particulier : on va donc le chercher
        //ABSPATH permet de revenir à la racine du site
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
        if(dbDelta($sql) == true){
            error_log('Fonction Prepare_To_Run : Requête éxécuté avec succés !');
        }else{
            error_log('Echec lors de l"éxecution de la requête :' . $wpdb->print_error());
        }
    }else{
        error_log('La table chasseavenirimages étant existante, pas besoin de la créer !');
    }
}


function Delete_Caroussel(){
    global $wpdb;
    $nom_table = $wpdb->prefix . 'chasseavenircaroussel';
    $charset_collate = $wpdb->get_charset_collate();
    error_log('Fonction Create_Caroussel : Fonction correctement appellé !');
}
  /**
   * Résumé de Create_Caroussel
   * @return void
   * @since 1.1.3
   * Modifié : 1.4.1
   * Créer une deuxième table pour la gestion des Caroussels
   * Cette table à pour clé primaire idCaroussel et pour clé étrangère idImage de Image
   */

function Create_Caroussel(){
    global $wpdb;
    $nom_table = $wpdb->prefix . 'chasseavenircaroussel';
    $charset_collate = $wpdb->get_charset_collate();
    error_log('Fonction Create_Caroussel : Fonction correctement appellé !');
    /*On vérifie et on ajoute ici une seconde table pour la gestion des caroussels sur l'entièreté du site*/
    if($wpdb->get_var("SHOW TABLES LIKE '$nom_table'") != $nom_table) {
        $sql = "CREATE TABLE $nom_table (
            idCaroussel mediumint(11) NOT NULL AUTO_INCREMENT,
            nomCaroussel varchar(30) NOT NULL,
            PRIMARY KEY  (idCaroussel)
        ) $charset_collate;";
        error_log('Fonction Create_Caroussel : Requête préparé avec succés !');
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
        echo $wpdb->print_error();
    }
}

  /**
   * Résumé de : Create_Slide
   * @return void
   * @since 1.5.1
   * Modifié : -
   * Créer une table SLIDE ayant pour clé étrangère la table posts de WordPress et Caroussel du plugin
   */

function Create_Slide(){
    global $wpdb;
    $slide = $wpdb->prefix . 'chasseavenirslide';
    $tableCar = $wpdb->prefix . 'chasseavenircaroussel';
    $wppost = $wpdb->prefix . 'posts';
    $charset_collate = $wpdb->get_charset_collate();
    error_log('Create_Slide() : Fonction appellé avec succés !');
    if($wpdb->get_var("SHOW TABLES LIKE '$slide'") != $slide) {
        $reqSlide = "CREATE TABLE IF NOT EXISTS $slide (
            idSlide mediumInt(11) NOT NULL AUTO_INCREMENT,
            nomSlide varchar(50) NOT NULL,
            descriptionSlide varchar(350) NULL,
            idCaroussel mediumInt(11) NOT NULL,
            mediaLibraryId mediumInt(11) NOT NULL,
            PRIMARY KEY(idSlide),
            FOREIGN KEY (idCaroussel) REFERENCES $tableCar(idCaroussel),
            FOREIGN KEY (mediaLibraryId) REFERENCES $wppost(ID)
            )$charset_collate";
        error_log('Create_Slide : Requête préparé avec succcés !');
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($reqSlide);
        //Vérification et affichage message dans les logs
        if(dbDelta($reqSlide)){
            error_log('La reqûete à été exécuté avec succès !');
        }else {
            error_log('Une erreur est survenu et la requête n\'a pas été exécute avec succès :');
            error_log($wpdb->print_error());
        }
    }
}

function message() {

}
add_action('admin_notices', 'message');
    
    

class ChaAv87{
    
    /**
     * Summary of ver
     * @var string
     */
    public $ver = '1.5.13';

    public function __construct(){

    }

    public function up(){
        define('CHASSEAVENIR_PATH', plugin_dir_path(__FILE__));
    }
}
    
   // Inclusions de toute les dépendance.
   foreach ( glob( plugin_dir_path( __FILE__ ) . 'admin/*.php' ) as $file ) {
    include_once $file;
   }
    
   add_action( 'plugins_loaded', 'tutsplus_custom_admin_settings' );

   /*function capitaine_remove_menu_pages() {
	remove_menu_page( 'tools.php' );
    remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'capitaine_remove_menu_pages' );*/
   /**
    * Starts the plugin.
    *
    * @since 1.0.0
    */
    
   function tutsplus_custom_admin_settings() {
    
    $plugin = new Submenu( new Submenu_Page() );
    $plugin->init();
   }

   function ajouter_page_menu(){
    $titre = chasseAvenir87() ? 'ChasseAvenir87' : 'ChasseAvenir';

    //$this->admin->add_page($titre, 'ChasseAvenir87');
   }

  /**
   * Résumé de get_diaporama_by_id
   * @param int $id
   * @return mixed
   * @since 1.6.0
   * Modifié : - 
   */

function get_diaporama_by_id(int $idDiapo){
    global $wpdb;
    $table_name = $wpdb->prefix. 'chasseavenircaroussel';
    $resultat = $wpdb->get_results(" SELECT * FROM $table_name WHERE idCaroussel = $idDiapo ", ARRAY_A);
    return $resultat;
}

function get_images_by_diaporama_id(int $idDiapo){
    error_log('[getAllSlide] > Fonction appellé avec succés !');
    global $wpdb;
    $table_name = $wpdb->prefix. 'chasseavenirslide';
    $resultat = $wpdb->get_results(" SELECT wp.guid, slide.* FROM $table_name slide INNER JOIN wp_posts wp ON wp.ID = slide.mediaLibraryId WHERE idCaroussel = $idDiapo ", ARRAY_A);
    return $resultat;
}


   /**
    * Fonction carrousel_shortcode
    * @return string
    * Cette fonction définit un caroussel qu'on pourra intégrer avec un shortcode.
    *
    * @since 1.0.0
    * Modifié : -
    */
    function carrousel_shortcode($atts) {
        // Récupérer l'argument du shortcode
        $atts = shortcode_atts(
            array(
                'id' => 0,
            ), $atts, 'carrousel'
        );
        $id = (int) $atts['id'];
    
        // Récupérer les informations sur le diaporama choisi
        $diaporama = get_diaporama_by_id($id);
        if (!$diaporama) {
            return '';
        }
    
        // Récupérer les images du diaporama
        $images = get_images_by_diaporama_id($id);
    
        // Initialiser le code HTML pour les diapositives
        $slides = '';
        foreach ($images as $image) {
            $slides .= '<div class="slide">';
            $slides .= '<img src="' . $image['guid'] . '" alt="">';
            $slides .= '</div>';
        }
    
        // Retourner le code HTML complet pour le carrousel
        return '<div id="mon-carrousel">' . $slides . '</div>';
    }
    
//add_shortcode permet de définir, en tapant [carousel] d'éxécuter la fonction carrousel_shortcode et d'intégrer le code dans la page souhaité.
add_shortcode( 'carrousel', 'carrousel_shortcode' );

?>