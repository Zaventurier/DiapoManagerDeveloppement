<?php
/**
 * Creates the submenu page for the plugin.
 *
 * @package Custom_Admin_Settings
 */

/**
 * Créer une sous menu pour la page principal du plugin.
 *
 * Fourni les fonctionnalité nécessaire pour le rendu de la page.
 *
 * @since 1.1.0
 * Modifié : -
 */

/**
 * Résumé de load_plugin_styles
 * @return void
 * @since 1.2.1
 * Modifié : -
 * Fonction permettant d'importer la feuille de style
 */
//error_log('');
ini_set('error_log', dirname(__FILE__) . '/debug.log');

if(! defined('ABSPATH')){
    die('No Acces');
}



class Submenu_Page{
    function render(){
        echo '<h1>Cette page est actuellement en maintenance !</h1>';
    }
    
}
?>