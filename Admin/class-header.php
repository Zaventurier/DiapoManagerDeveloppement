<?php

    /**
     * Summary of Header
     */





function render_header() {?>

<DOCTYPE html>
    <html>
        <head>
            <!-- Import du CSS de Bootsrap 5.3.0  -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
            <!-- Import des icônes Bootsrap 1.10.3 -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
            <style>
                .entete {
                    background-color: beige;
                    width: 100%;
                    height: auto;
                    text-align: left;
                    padding: 10px;
                    font-size: medium;
                    text-align: center;
                    margin-bottom: 20px;
                    position: fixed;
                }

                .btn:hover {
                    opacity: 0.6;
                }
            </style>
        </head>

        <body>
            <div class="row">
                <div class="col-md-1 text-center" style='background:rgb(250, 250, 188); '>
                    <div>
                        <button data-bs-toggle="modal" data-bs-target="#exampleModal" type="submit" name="creer" class="btn"
                            style="border:none;border-radius:initial;background:rgb(250, 250, 188);;;cursor:pointer;font-family: Helvetica;">
                            <i class="bi bi-plus-square"></i><br />
                            Créer
                        </button>
                    </div>
                </div>
                <?php
                $AllCaroussel = getAllCaroussel();
                foreach ($AllCaroussel as $unCaroussel) {
                    ?>
                    <div class='col-md-1 text-center' style='background:rgb(250, 250, 188); border:1px dashed white;'>
                        <button onclick="$_SESSION['idCaroussel'] = $unCaroussel['idCaroussel']" data-bs-toggle="modal" data-bs-target="#data" type="submit" name="diapo" class="btn"
                            style="border:none;border-radius:initial;background:rgb(250, 250, 188);cursor:pointer;font-family: Helvetica;">
                            <i class="bi bi-images"></i>
                            <?php echo $unCaroussel['nomCaroussel']; ?> 
                        </button>
                    </div>
                    <?php
                } ?>
            </div>
            <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" style="margin-top:15%;margin-left:20%;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter un nouveau diaporama</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post">
                                <input type="text" name="nomCaroussel" placeholder="Saisissez un nom" style="margin-bottom:4%"></input>
                                <div class="modal-footer" style="display:block;text-align:center;">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color:red;border-color:red;"><i class="bi bi-x"></i></button>
                                    <button type="submit" name="Valider" class="btn btn-primary" style="background-color:green;border-color:green;"><i class="bi bi-check2"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </html>
<?php

}


/**
 * Résumé de Create_Caroussel
 * @return void
 * @param array $nom
 * Créer un caroussel dans la base de données avec le nom donné par l'utilisateur
 * @since 1.5.1
 * Modifié : 1.5.2
 */

function Creer_Caroussel(array $array)
{
    error_log('Create_Caroussel > Fonction appellé avec succès !');
    global $wpdb;
    if ($array['nomCaroussel'] == null) {
        error_log('L\'insertion n\'a pu être exécuté car le champ "nomCaroussel" est vide !');
        //Appel de la fonction alert en rentrant le numéro de l'erreur.
        alert(1);
        exit;
    } else {
        $result = $wpdb->insert($wpdb->prefix . "chasseavenircaroussel", $array);
        if (!$result) {
            error_log('Create_Caroussel > Une erreur est survenu lors de l\'insertion dans la base de données : ' . $wpdb->print_error());
            $wpdb->print_error();
        } else {
            error_log('Create_Caroussel > Insertion effectué avec succès !');
            echo '<script type="text/javascript">location.reload();</script>';
            exit;
        }
        exit;
    }
}

/**
 * Résumé de getAllCaroussel
 * @return mixed
 * @since 1.5.0
 * Modifié : -
 */

    function getAllCaroussel()
    {
        error_log('getAllCaroussel > Fonction appellé avec succès !');
        global $wpdb;
        $AllCaroussel = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "chasseavenircaroussel", ARRAY_A);
        return $AllCaroussel;
    }


