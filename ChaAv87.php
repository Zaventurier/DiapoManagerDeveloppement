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
 * Description: Créer, Gérer et Supprimer vos Caroussels, Images depuis un simple pannel - Le plugin gère automatiquement les images que vous importer à travers des tables de votre base de données unique et indépendantes du reste. L'historique des correctifs/Ajouts est à consulter dans readme.me.
 * Author: Guillaume Pascail
 * Version: 1.4.1 - 18/01/2023
 * Author URI: 
 * License: 
 * License URI: 
 */

 //Fichiers requis
require_once( ABSPATH . 'wp-includes/shortcodes.php' );
require_once plugin_dir_path(__FILE__) . 'inc/ChAv-functions.php';

if ( ! defined( 'WPINC' ) ) {
    die;
   }


/**
 * Appel des fonctions qui vont s'éxécuter à l'activation du plugin
 * @since 1.1.2
 * Modifié : 1.4.1
 * Remarque : __FILE__ signifie que la requête est présente dans le fichier.
 */

register_activation_hook(__FILE__,'Prepare_To_Run');//On appelle la fonction Prepare_To_Run contenu dans ce fichier.
register_activation_hook(__FILE__, 'Create_Caroussel');//On appelle la fonction Create_Caroussel contenu dans ce fichier.



/**
 * Résumé de Prepare_To_Run
 * @return void
 * Fonction qui vérifie si il y à une table nommé ChasseAvenir87.
 * Si une table portant ce nom est déjà existante, alors la fonction ne fera rien.
 * Cette fonction ne gère pas les différentes erreurs qui pourrait être occasionnés.
 * Remarque : la table n'est pas relié au reste de la base de données et les images sont gérés de façon indépendantes du reste du site
 * @since 1.1.2
 * Modifié : 1.1.4.1
 */
function Prepare_To_Run() {
    global $wpdb;
    //Ici, on inclut le préfixe des tables WordPress au nom saisit. On va donc vérifier si il y à une table wp_ChasseAvenir87
    //Si elle n'existe pas, on va donc la créer.
    $table_name = $wpdb->prefix . "chasseavenirImage";
    $charset_collate = $wpdb->get_charset_collate();

    if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
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
        //Cette fonction necessite l'utilisation d'un fichier particulier : on va donc le chercher
        //ABSPATH permet de revenir à la racine du site
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }
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
    /*On vérifie et on ajoute ici une seconde table pour la gestion des caroussels sur l'entièreté du site*/
    if($wpdb->get_var("SHOW TABLES LIKE '$nom_table'") != $nom_table) {
        $sql = "CREATE TABLE $nom_table (
            idCaroussel mediumint(11) NOT NULL AUTO_INCREMENT,
            idImage mediumint(11) NOT NULL,
            page varchar(255) NOT NULL,
            ordre int(11) NOT NULL,
            PRIMARY KEY  (idCaroussel),
            FOREIGN KEY (idImage) REFERENCES wp_chasseavenirimage(idImage)
        ) $charset_collate;";
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
        echo $wpdb->print_error();
    }
}

class ChaAv87{
    
    /**
     * Summary of ver
     * @var string
     */
    public $ver = '1.1.2';

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


   /*function StyleFormulaire() {
    wp_enqueue_style( 'StyleFormulaire', plugin_dir_url( __FILE__ ) . 'inc/css/form.css' );
    }
    add_action( 'wp_enqueue_scripts', 'StyleFormulaire' );*/


   /**
    * Fonction carrousel_shortcode
    * @return string
    * Cette fonction définit un caroussel qu'on pourra intégrer avec un shortcode.
    */
   function carrousel_shortcode() {
    return '<div id="mon-carrousel">
                <div class="slide">Slide 1</div>
                <div class="slide">Slide 2</div>
                <div class="slide">Slide 3</div>
            </div>';
}
//add_shortcode permet de définir, en tapant [carousel] d'éxécuter la fonction carrousel_shortcode et d'intégrer le code dans la page souhaité.
add_shortcode( 'carrousel', 'carrousel_shortcode' );


