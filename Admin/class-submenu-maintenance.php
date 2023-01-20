<?php
 //error_log('');
 ini_set('error_log', dirname(__FILE__) . '/debug.log');
class Submenu_maintenance{
    
    function render_page_maintenance(){
        error_log('[ChasseAvenir87] > Utilisateur présent sur la page Maintenance !');
        echo '<h1>Cette page est temporairement indisponible !</h1>';
    }
}