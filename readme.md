==== Plugin ChasseAvenir87 ====
Développé par : Guillaume PASCAIL
Date création : 10 Janvier 2023
Version 1.5.3 - 25 Janvier 2023

Ce plugin sert à gérer des images et des caroussels (diaporamas) avec les images.
La dernière version du plugin permet d'ajouter des images, de les uploads dans la médiathèque.
Actuellement, seuls les fonctionnalités suivantes sont disponible :
> Ajout d'image;
> Un menu et des sous-menus personnalisés (ou presque);
> Une gestion quasi indépendante des caroussels sur votre site;

[/!\] > Depuis la version 1.5.0, le plugin utilise Boostrap 5.0.3 nécessaire à son fonctionnement. Cette utilisation peut révéler une incompatibilité avec certains thèmes/plugins. Certaines fonctionnalités nécessiteron une mise à jour de Bootsrap, ce qui sera spécifié dans se Patch Note.
[/!\] > Depuis la version 1.5.2, le plugin utilise la bibiothèque d'icônes de Boostrap 1.10.3 nécessaire à son fonctionnement. Cette utilisation peut entraîner de potentielles incompatibilité avec certains thèmes/plugins.

Vous pouvez retrouver ici dans ce fichier, l'historique des corrections/ajouts qui sont réalisés dans le plugin.
Nous nous éfforçons de regrouper au mieux les mises à jours.

Pour plus de visibilité nous nous éfforçons de garder une syntaxe précise :

DateMAJ - Version > [Version Ancienne/Actuelle]

Dans notre code, nous gardons une syntaxe particulière :
/**
* Résumé de la fonction
* return void
* (Facultatif) param $param 
* @since Version
* Modifié : VersionModificationFonction
* Un petit résumé de la fonction
**/

Nous rappelons que ce plugin est réalisé en France à donc comme langue le français.

[Remarque] : L'initialisation du répertoire GitHub ne coincident pas avec le début du projet : le 10 Janvier 2022

===== Historique des Mises à jours =====

10 Janvier 2023 - 1.1.0 > [Version Ancienne]
> Création du menu et ajout de la futur page du Panel admin;

12 Janvier 2023 - 1.1.1 > [Version Ancienne]
> Ajout du shortcode [carrousel] qui permettra d'intégrer le futur caroussel.;

13 Janvier 2023 - 1.1.2 > [Version Ancienne]
> Ajout du premier formulaire dans le Panel Adminstrateur;
> Ajout : Lorsque que l'utilisateur active le plugin, cela vérifie si la table nécessaire au fonctionnement du plugin est présente dans la base de données.;
> Si elle est non présente, celui-ci la créer avec tout les champs nécessaire.;
> Si elle est présente, le plugin n'est censé ne rien faire.;
> Modification structure sur la table insérer (ajout d'un champs supplémentaires : poidsImage et modification de structure sur dateAjout et dateSupression qui sont passé en datetime);
> Ajout d'une fonction de suppression de la table après la désinstallation du plugin [en test];

16 Janvier 2023 - 1.1.3 > [Version Ancienne]
> Ajout d'un sous menu
> Ajout d'une page qui servira à gérer les images importés par l'utilisateur;
> Correction du bug qui supprimé le menu Outils et EditComments;

16 Janvier 2023 - 1.2 > [Version Ancienne]
> Ajout du sous-menu Aide;
> Ajout du sous-menu Gérer les caroussels;
> Correction du bug de l'affichage de la page aide;
> Modification du code de l'éxécution du plugin (création d'une nouvelle table) => /!\ Bug : la table ne se créer pas mais n'a aucune incidence sur le fonctionnement actuel du plugin;
> Bug de l'affichage du sous-menu "Gérer les caroussels" régler;
> Bug qui afficher un message d'erreur sur la variable $wpdb résolu;
> Ajout de la possibilité d'ajouter des images dans la base de données; 
> Correctif de l'ajout de l'image dans la médiathèque;
> Correctif du bug d'insertion de l'image dans la base de données;
> Correction de bug mineurs;
> Modification de la structure de la table spécifique pour le plugin;
> Récupération de l'id de la médiathèque fonctionnel;
> Regroupement patchs entre eux pour plus de lisibilité;
> Ajout d'image pour les messages d'erreur ou de succés;
> Modification de la description du plugin;

17 Janvier 2023 - 1.2.1 > [Version Ancienne]
> Autorisation des fichiers en .svg pour l'importation des fichiers;
> Ajout d'une Pop-Up pouvant se fermer lorsque le fichier n'est pas compatible;
> Ajout d'une Pop-Up pouvant se femer lorsque le fichier est téléversé.;

17 Janvier 2023 - 1.2.2 > [Version Ancienne]
> Patch du formulaire d'insertion;

17 Janvier 2023 - 1.3 > [Version Ancienne]
> Le Glisser-Déposer sur le formulaire d'insertion est désormais fonctionnel;
> Modification du texte sur le formulaire de téléchargement;
> Opacité sur l'image de téléversement réglé;
> Changement du logo de l'onglet;
> Modification et Ajouts de texte déjà existants ou non existants;

18 Janvier 2023 - 1.3.1 > [Version Ancienne]
> Correction d'un bug critique de fonctionnement : l'insertion dans la base de données ne fonctionnait plus;

18 Janvier 2023 - 1.4.1 > [Version Ancienne]
> Correction du bug qui empêchait la création de la deuxième table de la base de données;
> Suppression d'un texte inutile sur un fichier;
> Supression de fichiers actuellement inutiles;
> Allègement du code : Séparation des différents sous-menus dans des fichiers différents;
> Début de la page de gestion des images;

19 Janvier 2023 - 1.4.2 > [Version Ancienne]
> Modification de la structure de la base de données : Ajout de la fonctionnalité de création de la vue.;
> Correction de bug;

19 Janvier 2023 - 1.4.3 > 
> Désactivation de la création de la vue à l'initialisation du plugin;
> Ajout d'un fichier "debug.log" permettant d'afficher les logs à des endroits particuliers et critiques;

20 Janvier 2023 - 1.4.4 > [Version Ancienne]
> Modification de l'emplacement du fichier de logs;
> Correction de l'affichage des images : Plus besoin de vue, tout ce fait à l'aide d'une requête plus simple;
> Grossisement des images dans leurs div;
> Modification de la structure de la base de données;
> Début de la gestion des caroussels;
> Désactivation de la gestion des images [Temporaire];
> Nettoyage du fichier de log (Sauvegarder);

23 Janvier 2023 - 1.5.0 > [Version Ancienne]
> Installation et Utilisation de Bootstrap 5.0.3 -> [Potentiel Incompatibilitiés avec des Thèmes/Plugins];
> Mise à jour de la page de gestion des carroussels;
> Réactivation de la gestion des images [Bug] -> Gestion toujours non disponible;
> Ajout de lien pour les icônes;
> Allègement du code : Suppression de fonction innutlisés;
> [Fonctionnalité] > L'utilisateur peut désormais ajouter un caroussel => La gestion des caroussels sera ajoutée dans la prochaine mise  à jour;

24 Janvier 2023 - 1.5.1 > [Version Ancienne]
> Ajout d'un message d'erreur dans les logs lorsque le champ est vide dans l'ajout de caroussel;
> Ajout d'un message d'erreur lorsque le champ est vide dans l'ajout de caroussel;
> Refus de la saisie lorsque le champ est vide dans l'ajout de caroussel;

24 Janvier 2023 - 1.5.2 > [Version Ancienne]
> [Fonctionnalité] > Raffraichissement automatique de la page après l'ajout d'un caroussel;
> Modification du système d'erreur
> Import et utilisation de la bibliotheque d'icônes de Boostrap 1.10.3
> Modification de certaines interfaces
> [Fonctionnalité Désactivée] > L'insertion d'images n'est plus possible à l'heure actuelle suite à de nombreux bugs;
> [Fonctionnalité] > Menu pour la gestion des Diaporamas;

25 Janvier 2023 - 1.5.3 > [Version Actuelle]
> Patch du bug du Téléversement des images;
> Relooking des messages de confirmations, warnings et échec;
> Suppression de pages inutiles
> Ajout d'icônes pour chaque diaporama dans la gestion des caroussels