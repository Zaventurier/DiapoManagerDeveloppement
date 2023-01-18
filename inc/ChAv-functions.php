<?php

/**
 * Ajout d'un nouveau menu au pannel administrateur
 * @return void
 */

/*add_action('admin_menu', 'ChAv_Add_My_Admin_Link');
function ChAv_Add_My_Admin_Link(){
    add_menu_page(
        'ChasseAvenir87',
        'ChasseAvenir87',
        'manage_options',
        'admin.php?page=ChAv'
    );

}