<?php
/**
 *Fichier permettant l'affichage de la page "Gérer les Caroussels"
 *
 * Fourni les fonctionnalité nécessaire pour le rendu de la page.
 *
 * @since 1.4.1
 * Modifié : 1.5.13
 */


//On initialise le fichier de débogage pour bébuger le code.
ini_set('error_log', dirname(__FILE__) . '/debug.log');
//On inclut le fichier qui contient la gestion du header
require_once plugin_dir_path(__FILE__) . '/class-header.php';

class Submenu_Diapo
{
    /**
     * Résumé de render_caroussel_page
     * @return void
     * Cette fonction gère l'affichage du sous menu Gérer les caroussels
     * @since 1.1.3
     * Modification : 1.5.2
     */
    function render_diapo_page()
    {
        error_log('[ChasseAvenir87] > Utilisateur présent sur la page de Gestion des caroussels !');
        // Code pour afficher le contenu de la page "Gérer les caroussels"?>
        <DOCTYPE html>
            <html>
                <head>
                    <!-- Import du CSS de Bootsrap 5.3.0  -->
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
                        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
                    <!-- Import des icônes Bootsrap 1.10.3 -->
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
                </head>
                <body>
                    <?php
                    //Appel de la fonction qui gère le header
                    render_header();
                    if (isset($_POST['diapo'])) {
                        $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
                        $id = isset($_POST['id']) ? $_POST['id'] : '';
                    } else {
                        $nom = "";
                        $id = 0;
                    }
                    ?>
                    <hr style="border-top: 2px solid gray;">
                    <div class="row">
                        <div class="col-md-2 text-center" style='border-right:2px solid gray;border-top:2px solid gray;border-bottom:2px solid gray; height:75vh;background:#efefee;'>
                            <form class="form-floating" action="" method="post">
                                <input name="nomDiapo" type="input" class="form-control" id="floatingInputValue" style="width:100%;margin-top:10px;" value="<?php echo $nom ?>">
                                <label for="floatingInputValue">Nom du Diaporama</label>
                                <div class="ModifDiapo" style="margin-top:5px;">
                                    <button value="<?php echo $id; ?>" type="submit" name="modifyDiapo" class="btn btn-primary" style="background-color:green;border-color:green;"><i class="bi bi-pencil-square"></i></button>
                                    <button value="<?php echo $id; ?>" type="submit" name="deleteDiapo" class="btn btn-primary" style="background-color:red; border-color:red;"><i class="bi bi-trash3"></i></button>
                                    <button value="<?php echo $id; ?>" type="submit" name="deleteAllSlides" class="btn btn-primary" style="background-color:orange; border-color:orange;"><i class="bi bi-trash"></i></button>
                                </div>
                            </form>
                            <?php
                            /**
                             * Vérification : 
                             * Si le champs du nom est null ou vide, alors on affiche un message d'erreur
                             * Sinon, on effectue la suppression
                             */
                            if (isset($_POST['deleteDiapo'])) {
                                if ($_POST['deleteDiapo'] == 0) {
                                    echo '<div class="alert alert-danger" role="alert" style="margin-top:10px">Aucun diaporama n\'à été sélectionné !</div>';
                                } else {
                                    //Si le bouton supprimer est cliquer
                                    $idDiapo = $_POST['deleteDiapo'];
                                    deleteAllSlide($idDiapo);
                                   deleteDiapo($idDiapo);
                                }
                            }
                            if (isset($_POST['modifyDiapo'])) {
                                if ($_POST['modifyDiapo'] == 0) {
                                    echo '<div class="alert alert-danger" role="alert" style="margin-top:10px">La saisit d\'un nom est obigatoire !</div>';
                                }else {
                                //Si le bouton modifier est cliquer
                                $newName = $_POST['nomDiapo'];
                                $idDiapo = $_POST['modifyDiapo'];
                                ModifDiapo($idDiapo, $newName);   
                                }
                            }
                            if (isset($_POST['deleteAllSlides'])) {
                                if ($_POST['deleteAllSlides'] == 0) {
                                    echo '<div class="alert alert-danger" role="alert" style="margin-top:10px">Aucun diaporama n\'à été sélectionné !</div>';
                                }else{
                                    $idDiapo = $_POST['deleteAllSlides'];
                                    deleteAllSlide($idDiapo);
                                }
                            }
                            ?>
                            <hr style="border-top: 2px solid gray;">
                            <div class="AddSlide">
                                <button data-bs-toggle="modal" data-bs-target="#AddSlide" type="submit" name="creer" class="btn btn-outline-secondary"><i class="bi bi-plus-lg"></i>Ajouter un Slide</button>
                            </div>
                            <hr style="border-top: 2px solid gray;">
                            <div class="mb-3">
                                <label class="form-label">Créer un diaporama automatique :</label>
                                <input class="form-control" type="text" aria-label="readonly input example" value="<?php echo '[DiapoA id='. $id .']'?>" readonly>
                            </div>
                            <hr style="border-top: 2px solid gray;">
                            <div class="mb-3">
                                <label class="form-label">Créer un diaporama manuel :</label>
                                <input class="form-control" type="text" aria-label="readonly input example" value="<?php echo '[DiapoM id='. $id .']'?>" readonly>
                            </div>
                            <hr style="border-top: 2px solid gray;">
                        </div>
                        <div class="col-md-9 text-center" style='height: 100vh;'>
                            <?php
                            $AllSlide = getAllSlide($id);
                            foreach($AllSlide as $unSlide){?>
                                <div class="unSlide" style="justify-content: space-between;height:100px; padding-bottom:50px;">
                                    <form action="" method="post">
                                        <input type="hidden" name="idSlide" value="<?php echo $unSlide['idSlide'];?>">
                                        <input type="hidden" name="SlideName" value="<?php echo $unSlide['nomSlide'];?> ">
                                        <input type="hidden" name="DescSlide" value="<?php echo $unSlide['descriptionSlide'];?>">
                                        <input type="hidden" name="idDiapo" value="<?php echo $unSlide['idCaroussel'];?>">
                                        <input type="hidden" name="mediaLibraryId" value="<?php echo $unSlide['mediaLibraryId'];?>">
                                        <div class="imgSlide" style="width:33.33%; height:100px; float:left;">
                                            <img src="<?php echo $unSlide['guid'];?>" style="height:100px; margin-right:100%;">
                                        </div>
                                        <div class="nomSlide" style="width:33.33%; height:100px; float:left;">
                                            <div class="nom" style="width:50%; height:100px; float:left;">
                                                <input type="input" class="form-control" id="floatingInputValue" style="width:110%;margin-top:10px;" value="<?php echo $unSlide['nomSlide'] ?>" disabled>
                                            </div>
                                            <div class="btnDelete" style="width:50%; height:100px; float:left;">
                                                <button type="submit" name="deleteSlide" value="<?php echo $unSlide['nomSlide'];?>" class="btn btn-primary" style="background-color:red; border-color:red;">
                                                    <i class="bi bi-trash3"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="desc" style="width:33.33%;float:left;">
                                            <div class="description" style="width:50%; height:100px; float:left;">
                                                <input name="desc" class="form-control" type="text" aria-label="readonly input example" value="<?php echo $unSlide['descriptionSlide'];?>">
                                            </div>
                                            <div class="btnModifDesc" style="width:50%; height:100px; float:left;">
                                            <button value="<?php echo $unSlide['idSlide'] ?>" data-bs-toggle="modal" data-bs-target="#ModifDesc" type="submit" name="ModifDesc" class="btn btn-outline-secondary">Modifier</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            <?php
                            }
                            ?>    
                        </div><?php
                        if (isset($_POST['slide'])) {
                            $SlideName = isset($_POST['SlideName']) ? $_POST['SlideName'] : '';
                            $idSlide = isset($_POST['idSlide']) ? $_POST['idSlide'] : '';
                            $description = isset($_POST['descriptionSlide']) ? $_POST['descriptionSlide'] : '';
                            $DiapoId = isset($_POST['idDiapo'])? $_POST['idDiapo'] : '';
                            $mediaLibraryId = isset($_POST['mediaLibraryId']) ? $_POST['mediaLibraryId'] : '';
                        } else {
                            $SlideName = "";
                            $idSlide = "";
                            $description = "";
                            $DiapoId = "";
                            $mediaLibraryId = "";
                        }

                        if (isset($_POST['deleteSlide'])) {
                            if ($_POST['deleteSlide'] == null) {
                                echo '<div class="alert alert-danger" role="alert" style="margin-top:10px">Aucun slide n\'à été sélectionné !</div>';
                            } else {
                                $idSlide = $_POST['idSlide'];
                                //error_log('');
                                deleteSlide($idSlide);
                            }
                        }
                        if (isset($_POST['ModifDesc'])) {
                            $NewDesc = $_POST['desc'];
                            $idSlideA = $_POST['idSlide'];

                            modifDesc($NewDesc, $idSlideA);
                        }
                        ?>
                    </div>
                    <!-- Modal pour l'ajout s'un slide -->
                    <div class="modal" id="AddSlide" tabindex="-1" aria-labelledby="AddSlide" aria-hidden="true">
                        <div class="modal-dialog" style="margin-top:15%;margin-left:20%;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter un Slide pour <u><?php echo $nom; ?></u></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close">
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="" enctype="multipart/form-data">
                                        <input type="text" name="nomSlide" placeholder="Saisissez un nom " style="margin-bottom:4%;width:50%"></input>
                                        <div class="mb-3">
                                            <label class="form-label">Dépôt d'un fichier</label>
                                            <input class="form-control" type="file" id="image" name="image">
                                        </div>
                                        <input type="hidden" name="idDiapo" value="<?php echo $id ?>">
                                        <div class="modal-footer" style="display:block;text-align:center;">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color:red;border-color:red;"><i class="bi bi-x"></i></button>
                                            <button value="" type="submit" name="AddASlide" class="btn btn-primary" style="background-color:green;border-color:green;"><i class="bi bi-check2"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (isset($_POST['AddASlide'])) {

                        $nomSlide = $_POST['nomSlide'];
                        $idCaroussel = $_POST['idDiapo'];
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
                                    exit;
                                }
                            } else {
                                error_log('Une erreur inconnu s\'est produite durant le téléversement du fichier !');
                                exit;
                            }
                        } else {
                            error_log('Erreur : l\'extension ' . $fileActualExt . ' est incompatible !');
                            exit;
                        }
                        $data = array(
                            'idSlide' => Null,
                            'nomSlide' => $nomSlide,
                            'idCaroussel' => $idCaroussel,
                            'mediaLibraryId' => $attach_id
                        );
                        //Appel de la fonction AddSlide dans lequel on passe notre tableau en paramètre
                        AddSlide($data);
                    }?>
                </body>
                <!-- Import du JS de Bootsrap 5.3.0  -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
                    document.querySelectorAll('.nav-link').forEach(link => {
                        link.addEventListener('click', (e) => {
                            e.preventDefault();
                            const target = e.target.getAttribute('data-target');
                            document.querySelectorAll('.content').forEach(content => {
                                content.style.display = 'none';
                            });
                            if (target === "supprimer-diapo") {
                                document.querySelector(target).style.display = 'block';
                            }
                        });
                    });
                </script>
            </html>
            <?php
            if (isset($_POST['SuppDiapo'])) {
                echo '
                <div class="alert alert-info alert-dismissible fade show">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Info!</strong> This alert box could indicate a neutral informative change or action.
              </div>';
            }
    }
}

    /**
     * Résumé de deleteDiapo
     * @param int $idDiapo
     * @return void
     * @since 1.5.6
     * Modifié : -
     */


    function deleteDiapo(int $idDiapo)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'chasseavenircaroussel';
        $wpdb->delete($table_name, array('idCaroussel' => $idDiapo));
        echo '<script type="text/javascript">location.reload();</script>';
    }

    /**
     * Résumé de ModifDiapo
     * @param int $idDiapo
     * @param string $newName
     * @return void
     * @since 1.5.6
     * Modifié : -
     */


    function ModifDiapo(int $idDiapo, string $newName)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'chasseavenircaroussel';
        $wpdb->update($table_name, array('nomCaroussel' => $newName), array('idCaroussel' => $idDiapo));
        echo '<script type="text/javascript">location.reload();</script>';
    }



    /**
     * Résumé de AddSlide
     * @return void
     * @since 1.5.6
     * @param $array
     * Modifié : 1.5.9
     * Permet d'ajouter une slide : les données à ajouté sont passés en paramètre dans un tableau associatif
     */
function AddSlide($array){
    error_log("[AddSlide] > Fonction appellé avec succés !");
    global $wpdb;
    $table_name = $wpdb->prefix . 'chasseavenirslide';

    $resultat = $wpdb->insert($table_name, $array);

    if (!$resultat) {
        error_log('[AddSlide] > Une erreur est survenue lors de l\'ajout du slide !');
        error_log($wpdb->print_error());
    }else{
        echo '<script type="text/javascript">location.reload();</script>';
        error_log('[AddSlide] > L\'ajout s\'est déroulé avec succés !');
    }
}

    /**
     * Résumé de getAllSlide
     * @return array $resultat
     * @since 1.5.6
     * @param $idDiapo
     * Modifié : 1.5.9
     * Permet d'afficher toutes les slides d'un diaporama donnée
     */
    function getAllSlide(int $idDiapo){
        error_log('[getAllSlide] > Fonction appellé avec succés !');
        global $wpdb;
        $table_name = $wpdb->prefix. 'chasseavenirslide';
        $wppost = $wpdb->prefix . 'posts';

        $resultat = $wpdb->get_results(" SELECT wp.guid, slide.* FROM $table_name slide INNER JOIN $wppost wp ON wp.ID = slide.mediaLibraryId WHERE idCaroussel = $idDiapo ", ARRAY_A);

        return $resultat;

        if(!$resultat){
            error_log('[getAllSlide] > Une erreur est survenue durant la récupération des slides !');
        }else{
            echo '<script type="text/javascript">location.reload();</script>';
            error_log('[getAllSlide] > Requête éxcuté avec succés !');
        }
    }

        /**
         * Résumé de countSlide
         * @param int $idDiapo
         * @return int 
         * @since 1.5.10
         * Modifié : -
         * Retourne le nombre de slides pour un diaporama passée en paramètre 
         */

    function countSlide(int $idDiapo){
        error_log('[countSlide] > Fonction appellé avec succés!');
        global $wpdb;
        $table_name = $wpdb->prefix. 'chasseavenirslide';

        $resultat = $wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE idCaroussel = $idDiapo");
        return $resultat;
    }



    /**
     * Résumé de deleteSlide 
     * @param int $idSlide
     * @return void
     * @since 1.5.6
     * Modifié : 1.5.10
     * Permet de supprimer une slide d'une dispo définie
     */
    function deleteSlide(int $idSlide){
        error_log('[deleteSlide] > Fonction appellé avec succés!');
        global $wpdb;
        $table_name = $wpdb->prefix . 'chasseavenirslide';
        $wpdb->delete($table_name, array('idSlide' => $idSlide));
        echo '<script type="text/javascript">location.reload();</script>';
    }

    /**
     * Résumé de ModifSlide
     * @param int $idDiapo
     * @param int $idSlide
     * @return void
     * @since 1.5.6
     * Modifié : -
     * Permet de modifier une slide d'une dispo définie => Actuellement impossible
     */
    function ModifSlide(int $idDiapo, int $idSlide)
    {

    }

        /**
         * Résumé de modifDesc
         * @param string $desc
         * @param int $idSlide
         * @return void
         * @since 1.5.13
         */


    function modifDesc(String $desc, int $idSlide){
        global $wpdb;
        $table_name = $wpdb->prefix . "chasseavenirslide";
        $wpdb->update($table_name, array( 
              'descriptionSlide' => $desc), 
            array( 
              'idSlide' => $idSlide
            ), 
            array( 
              '%s', 
              '%s' 
            ), 
            array( 
              '%d' 
            ) 
          );
        echo '<script type="text/javascript">location.reload();</script>';
    }

      /**
       * Résumé de deleteAllSlide
       * @return void
       * @param int $idDiapo
       * @since 1.5.9
       * Modifié : -
       * Permet de supprimer toutes les slides d'un diaporama définit : cette fonction est à utilisée uniquement pour la suppression
       * du diaporama
       */

    function deleteAllSlide(int $idDiapo){
        error_log('[deleteAllSlide] > Fonction appellé avec succés!');
        global $wpdb;
        $table_name = $wpdb->prefix. 'chasseavenirslide';
        $wpdb->delete($table_name, array('idCaroussel' => $idDiapo));
        echo '<script type="text/javascript">location.reload();</script>';
    }
?>