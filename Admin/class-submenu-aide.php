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
                                <h5 class="card-title">Questions-Réponses</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Une question ? Vous aurez peut être la réponse ici !</h6>
                                <p class="card-text">Découvrez toutes les questions récurentes sur le fonctionnement de ce plugin.</p>
                                <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-diamond" viewBox="0 0 16 16">
                                <path d="M6.95.435c.58-.58 1.52-.58 2.1 0l6.515 6.516c.58.58.58 1.519 0 2.098L9.05 15.565c-.58.58-1.519.58-2.098 0L.435 9.05a1.482 1.482 0 0 1 0-2.098L6.95.435zm1.4.7a.495.495 0 0 0-.7 0L1.134 7.65a.495.495 0 0 0 0 .7l6.516 6.516a.495.495 0 0 0 .7 0l6.516-6.516a.495.495 0 0 0 0-.7L8.35 1.134z"/>
                                <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                                </svg>Ce Question-Réponse est compatible aux versions 1.6 et supérieures ! Il n'est plus à jour pour les versions antérieures !</p><br/>
                                <p><i>Plugin ChasseAvenir87 - Version 1.6.1 - 02 Février 2023</i></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">
                            <h4 id="question1">Quels Framework utilise le plugin ?
                            <p>Notre plugin utilise la dernière version de Boostrap (5.3.0).<br/>
                               Nous utilisons également la bibliothèque d'image de Boostrap (1.10.3)</p>
                            <h4 id="question2">Quelles sont les fonctionnalités du plugin et comment s'en servir ?</h4>
                            <p>Ce plugin à pour objectifs de vous aider à gérer au mieux vos différents diaporamas !<br/>
                               Vous pouvez Créer, Supprimer et gérer images et descriptions dans chacun de vos diaporamas, de manière simple et pratique.<br/>
                               Il vous suffit de cliquer sur les boutons indiqué pour réaliser des actions.</p>
                            <h4 id="question3">Que faire si je désire supprimer toutes les diapositive de mon diaporama sans supprimer celui-ci ?</h4>
                            <p>Pour ce faire, vous pouvez cliquer sur le bouton orange de votre interface <i><u>(veillez à avoir cliquer sur le diaporama en question avant)</u></i><br/>
                               et cela supprimera l'entièreté des diapositives ! Attention : si vous confirmer la suppression, l'action sera irreversible et vous perdrez tout !</p>
                            <h4 id="question4">Quelle est la marche à suivre pour créer un diaporama ?</h4>
                            <p>Pour créer votre diaporama, suivez les étapes suivantes :<br/>
                               1- Créer un diaporama (en haut à gauche de votre interface)<br/>
                               2- Saisissez le nom que vous souhaitez à votre diaporama et cliquer sur le bouton valider (en vert) : le diaporama apparâit désormais dans la barre en haut.<br/>
                               3- <i>(Si vous voulez modifier le nom de votre diaporama)</i>, effacer l'ancien nom et saisissez le nouveau et cliquer sur le bouton vert en dessous.<br/>
                               4- Si vous avez cliquer sur le diaporama, cliquer sur le bouton "Ajouter un Slide" et saisissez son nom et choisissez une image.<br/>
                               5- Vous pouvez désormais modifier la description ou supprimer le slide directement depuis votre interface.</p>
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