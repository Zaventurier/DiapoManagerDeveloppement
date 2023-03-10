<?php
/**
 * Fichier permettant l'affichage de la page "Info"
 *
 * Fourni les fonctionnalité nécessaire pour le rendu de la page.
 *
 * @since 1.4.1
 * Modifié : 1.5.12
 */
 //error_log('');
 ini_set('error_log', dirname(__FILE__) . './debug.log');

 class Submenu_Aide {
      /**
   * Résumé de render_aide_page
   * @return void
   * Cette fonction gère l'affichage du sous menu Aide
   * @since 1.1.3
   * Modification : 1.5.13
   */
    public function render_aide_page(){
        error_log('[ChasseAvenir87] > Utilisateur présent sur la page d\'info !');
        // Code pour afficher le contenu de la page "Aide"?>
        <DOCTYPE html>
            <html lang="fr">
                <head>
                     <!-- Import du CSS de Bootsrap 5.3.0  -->
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
                    <!-- Import des icônes Bootsrap 1.10.3 -->
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
                    <style>
                            
                    </style>
                </head>
                <body>
                <div class="row">
                    <div class="col-4">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Présentation du Plugin</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Tout savoir sur ce plugin</h6>
                                <p class="card-text">Toutes les informations à savoir sur le fonctionnement de ce plugin.</p>                                
                            </div>
                        </div>
                    </div>
                    <div class="col-7" style="padding-top:20px;">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    Quels Framework utilise le plugin ?
                                </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Notre plugin utilise la dernière version de Boostrap (5.3.0) ainsi que la dernière version de la bibliothèque d'image de Boostrap (1.10.3).</p><br/>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Quelles sont les fonctionnalités du plugin et comment s'en servir ?
                                </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Ce plugin à pour objectifs de vous aider à gérer au mieux vos différents diaporamas !<br/>
                                            Vous pouvez Créer, Supprimer et gérer images et descriptions dans chacun de vos diaporamas, de manière simple et pratique.<br/>
                                            Il vous suffit de cliquer sur les boutons indiqué pour réaliser des actions.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Que faire si je désire supprimer toutes les diapositive de mon diaporama sans supprimer celui-ci ?
                                </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Pour ce faire, vous pouvez cliquer sur le bouton orange de votre interface <i><u>(veillez à avoir cliquer sur le diaporama en question avant)</u></i><br/>
                                            et cela supprimera l'entièreté des diapositives ! Attention : si vous confirmer la suppression, l'action sera irreversible et vous perdrez tout !
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFourth" aria-expanded="false" aria-controls="collapseFourth">
                                    Quelle est la marche à suivre pour créer un diaporama ?
                                </button>
                                </h2>
                                <div id="collapseFourth" class="accordion-collapse collapse" aria-labelledby="headingFourth" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Pour créer votre diaporama, suivez les étapes suivantes :<br/>
                                            1- Créer un diaporama (en haut à gauche de votre interface)<br/>
                                            2- Saisissez le nom que vous souhaitez à votre diaporama et cliquer sur le bouton valider (en vert) : le diaporama apparâit désormais dans la barre en haut.<br/>
                                            3- <i>(Si vous voulez modifier le nom de votre diaporama)</i>, effacer l'ancien nom et saisissez le nouveau et cliquer sur le bouton vert en dessous.<br/>
                                            4- Si vous avez cliquer sur le diaporama, cliquer sur le bouton "Ajouter un Slide" et saisissez son nom et choisissez une image.<br/>
                                            5- Vous pouvez désormais modifier la description ou supprimer le slide directement depuis votre interface.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </body>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
            </html>
        <?php
    }

 }
 ?>