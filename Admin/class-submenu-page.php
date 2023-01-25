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



class Submenu_Page
{


    /**
     * Cette fonction renvoi un contenu associé à un menu qui assure le rendu.
     */

    //plugins_url( 'myscript.js', __FILE__ );
    function render()
    {
        error_log('[ChasseAvenir87] > Utilisateur présent sur page d\'ajout d\'image !'); ?>

        <head>
            <!-- Import du CSS de Bootsrap 5.3.0  -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
            <!-- Import des icônes Bootsrap 1.10.3 -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        </head>
        <h1 style="text-align: center;"><strong>ChasseAvenir87</strong> - Ajouter des Images</h1><br />
        <p style="text-align:center;">Ajouter vos images directement depuis votre Panel de Gestion<br />
            Vous pourrez les modifier, ajouter une description dans l'onglet "Gérer les Images" !</p>
        <style>
            .popup {
                display: flex;
                position: fixed;
                transform: translate(-50%, -50%);
                border: 5px solid yellow;
                width: 25%;
                background-color: gray;
                padding: 15px;
                z-index: 7;
                border-radius: 25px;
                margin-right: auto;
                margin-left: auto;
                text-align: center;
            }

            /* Style pour la croix de fermeture */
            .close {
                position: absolute;
                top: 10px;
                right: 10px;
                cursor: pointer;
                color: white;
            }

            #drop_zone {
                border: 2px dashed #bbbbbb;
                padding: 50px;
                text-align: center;
            }

            .button img:hover {
                opacity: 0.5;
            }
        </style>
        <!--<input type="file" name="image" id="image"><br><br>--><!--<label for="image" required>Choisir une image à téléverser :</label>-->

        <body>
            <form action="" method="post" enctype="multipart/form-data">
                <div
                    style="width:35%; background-color:gray;padding:15px;border-radius: 25px;border: 5px solid yellow;display:flex;flex-direction:column;">
                    <p style="color:white;">Choisissez ou deposez une image à télécharger et cliquer sur "Télécharger"<br />
                        La <strong>taille maximale</strong> de fichier est de <strong>50Mo</strong> et seul les fichiers en
                        <strong>.jpg, .png, .jpeg, .pdf ou .svg sont acceptés !</strong></p>
                    <div id="drop_zone" style="color:white;">Glissez-déposez votre fichier ici
                        <input type="file" id="image" name="image">
                    </div>
                    <div style="text-align:center; background-color:gray;align-self:center;margin-top:10px;">
                        <button type="submit" name="submit" class="btn btn-outline-warning">Téléverser</button>
                    </div>
                </div>
            </form>
            <?php
            if (isset($_POST['submit'])) {
                $file = $_FILES['image'];
                $fileName = $_FILES['image']['name'];
                $fileTmpName = $_FILES['image']['tmp_name'];
                $fileSize = $_FILES['image']['size'];
                $fileError = $_FILES['image']['error'];
                $fileType = $_FILES['image']['type'];

                $fileExt = explode('.', $fileName);
                $fileActualExt = strtolower(end($fileExt));
                //Liste des extensions autorisés.
                $allowed = array('jpg', 'jpeg', 'png', 'pdf', 'svg');

                if (in_array($fileActualExt, $allowed)) {
                    if ($fileError === 0) {
                        //Taille maximale du fichier : 10MO
                        if ($fileSize < 52428800) {
                            $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                            //Définir le chemin d'upload
                            $upload_dir = wp_upload_dir();
                            $fileDestination = $upload_dir['basedir'] . '/' . $fileNameNew;
                            move_uploaded_file($fileTmpName, $fileDestination);
                            
                            $this->alertPositive();

                            // Insérer l'image dans la médiathèque
                            $wp_filetype = wp_check_filetype(basename($fileName), null);
                            $attachment = array(
                                'guid' => $upload_dir['baseurl'] . '/' . basename($fileNameNew),
                                'post_mime_type' => $wp_filetype['type'],
                                'post_title' => preg_replace('/\.[^.]+$/', '', basename($fileName)),
                                'post_content' => '',
                                'post_status' => 'inherit'
                            );
                            $attach_id = wp_insert_attachment($attachment, $fileDestination);
                            $attach_data = wp_generate_attachment_metadata($attach_id, $fileDestination);
                            wp_update_attachment_metadata($attach_id, $attach_data);
                            //echo "<img src='images/check.png'>Image ajoutée à la médiathèque avec succès !<br/>";
                        } else {
                            error_log('Erreur : le fichier est trop volumineux !');
                            //Fichier trop volumineux
                            $this->alertWarning('poids');
                            exit;
                        }
                    } else {
                        error_log('Une erreur inconnu s\'est produite durant le téléversement du fichier !');
                        $this->alertError('inconnu');
                        exit;
                    }

                } else {
                    error_log('Erreur : l\'extension ' . $fileActualExt . ' est incompatible !');
                    $this->alertWarning('format');
                    exit;
                }
                $data = array(
                    'idImage' => Null,
                    'cheminImage' => $fileDestination,
                    'nomImage' => $fileName,
                    'descriptionImage' => Null,
                    'extensionImage' => $fileActualExt,
                    'poidsImage' => $fileSize,
                    'dateAjout' => date('Y-m-d H:i:s'),
                    'estSupprime' => 0,
                    'dateSuppression' => null,
                    'mediaLibraryId' => $attach_id

                );
                //Appel de la fonction insertImage dans lequel on passe notre tableau en paramètre
                $this->insertImage($data);
            }?>
        </body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
            
            <?php
    }

    /**
     * Résumé de insertImage
     * @param array $array
     * @return void
     * Cette fonction à pour but d'effectuer l'insertion dans la base de données
     * @since 1.1.3
     * Modifié : 1.3
     */
    function insertImage(array $array)
    {
        error_log('Fonction insertImage appellé avec succés !');
        global $wpdb;
        $result = $wpdb->insert($wpdb->prefix . "chasseavenirimage", $array);
        if (!$result) {
            error_log('Fonction insertImage : Une erreur est survenu lors de l\'insertion dans la base de données : ' . $wpdb->print_error());
            $wpdb->print_error();
        } else {
            error_log('Les données concernant l\'image ' . $array['nomImage'] . ' ont été inséré avec succés : ');
            error_log($array['cheminImage']);
            error_log($array['extensionImage']);
            error_log($array['poidsImage']);
            error_log($array['dateAjout']);
            error_log($array['mediaLibraryId']);
        }
    }

      /**
       * Résumé de alertPositive
       * @param null
       * @return void
       * @since 1.5.3
       * Modifié : -
       * Permet de réaliser une alerte Positive lorsque qu'elle est appellé.
       */

    function alertPositive(){
        echo '<div class="alert alert-success alert-dismissible fade show" style="width: 50%; margin-top: 3%; margin-left: 50%; margin-right:20px;">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Succés ! </strong> Le téléversement s\'est déroulé sans encombres !
    </div>';
    }

      /**
       * Résumé de alertWarning
       * @param string $erreur
       * @return void
       * @since 1.5.3
       * Modifié : -
       * Permet de réaliser une alerte Warning lorsque qu'elle est appellé en fonction de l'erreur passé en paramètre.
       */

    function alertWarning(String $erreur){
        if($erreur == 'poids'){
            echo '
            <div class="alert alert-warning alert-dismissible fade show" style="width: 50%; margin-top: 3%; margin-left: 50%; margin-right:20px;">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Attention !</strong> Votre fichier est trop volumineux ! Il doit être inférieur à 10Mo !
            </div>';
        }
        else if($erreur == 'format'){
            echo ' <div class="alert alert-warning alert-dismissible fade show" style="width: 50%; margin-top: 3%; margin-left: 50%; margin-right:20px;">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Erreur de format !</strong> Le format du fichier est incompatible !
          </div>';
        }
    }

      /**
       *Résulé de alertError
       * @param string $erreur
       * @return void
       * @since 1.5.3
       * Mofidié : -
       * Permet d'afficher un message d'erreur en fonction de l'erreur passé en paramètre !
       */

    function alertError(string $erreur){
        if($erreur == 'inconnu'){
            echo '  <div class="alert alert-danger alert-dismissible fade show" style="width: 50%; margin-top: 3%; margin-left: 50%; margin-right:20px;">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Erreur !</strong> Une erreur inconnu s\'est produite durant le téléversement de votre fichier !.
          </div>';
        }

    }
    
}
?>