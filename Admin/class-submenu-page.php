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
//error_log('');
ini_set('error_log', dirname(__FILE__) . '/debug.log');

if(! defined('ABSPATH')){
    die('No Acces');
}




class Submenu_Page{

    function render(){
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
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <p class="card-text">Version 1.6.6 - Février 2023</p>
                                <p>Une remarque, une question ou un bug à signaler ? Rendez-vous ici :</p>
                                <a href="https://forms.gle/bKkDHFd4Lgt7d3r29" class="btn btn-secondary"><i class="bi bi-google"></i></a>                                
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
                                <h2 class="accordion-header" id="headingFourth">
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
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFifth">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFifth" aria-expanded="false" aria-controls="collapseFifth">
                                    Une fois mon diaporama créé dans l'interface, comment puis-je l'afficher ?
                                </button>
                                </h2>
                                <div id="collapseFifth" class="accordion-collapse collapse" aria-labelledby="headingFifth" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Il vous suffit de copier le shortcode de votre choix et de le coller dans une baliser "Code court" dans la page de votre choix.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    Quels sont les différents type de diaporama possible dans grâce à ce plugin ?
                                </button>
                                </h2>
                                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Vous pouvez créer 2 types de diapormas différents :<br/>
                                        - Le diaporama automatique : l'image se change automatiquement <i>(vous pouvez tout de même faire défiler les images grâces aux flêches)</i><br/>
                                        - Le diaporama manuel : Le diaporama ne défile pas automatiquement : il faut obligatoirement utiliser les flêches pour changer.<br/>
                                        <strong>A noter qu'il est actuellement impossible de définir le temps de défilement du diaporama <i>(car définit par Boostrap)</i></strong></p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingSeven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                    Informations complémentaires
                                </button>
                                </h2>
                                <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Plugin créer par PASCAIL Guillaume en Janvier-Février 2023. En cas de problèmes, se référer en premier lieu à cette FAQ.<br/>
                                        En cas de bugs ou remarques, un formulaire google à été mis en place ou vous pouvez les écrires pour me les faire parvenir.
                                        <i class="bi bi-exclamation-square"></i> : Lorsque l'id est égal à 0, le plugin n'aura pas la possibilité de créer de diaporama !</p>
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