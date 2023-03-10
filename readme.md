==== Plugin DiapoManager ====
Développé par : Guillaume PASCAIL
Date création : 10 Janvier 2023
Changement de nom : 09 Février 2023
Version 1.8.3 - 10 Février 2023
Licence : Pas de Licence actuellement

Ce plugin sert à gérer des images et des caroussels (diaporamas) avec les images.
La dernière version permet d'ajouter des images à votre diaporama et à les gérer efficacement grâce à une interface simple d'utilisation.

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

Nous rappelons que ce plugin est réalisé en France et a donc comme langue le français.

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

25 Janvier 2023 - 1.5.3 > [Version Ancienne]
> Patch du bug du Téléversement des images;
> Relooking des messages de confirmations, warnings et échec;
> Suppression de pages inutiles
> Ajout d'icônes pour chaque diaporama dans la gestion des caroussels

25 Janvier 2023 - 1.5.4 > [Version Ancienne]
> Mise à jour de la gestion des différentes parties de la gestion des diaporamas;

26 Janvier 2023 - 1.5.5 > [Version Ancienne]
> Mise à niveau du code : plus de lisibilité;
> Commencement d'une interface utilisateur pour la gestion des Diaporamas;
> Ajout de nouvelles feuilles de styles CSS;

26 Janvier 2023 - 1.5.6 > [Version Ancienne]
> Amélioration de l'interface utilisateur pour la gestion des Diaporamas;
> [Fonctionnalité] > La suppression d'un diaporama est désormais fonctionnel sans bugs;
> [Bug] > Le bug des erreurs au rechargement de la page à été patch;
> Ajout d'un modal pour l'ajout des slides (NF pour le moment);

27 Janvier 2023 - 1.5.7 > [Version Ancienne]
> [Bug] > Patch des erreurs lorsque les champs nomDiapo et nomSlide sont null ou vide;
> [Fonctionnalité] > Gestion des erreurs lorssque les chmaps nomDiapo et nomSlide sont null ou vide;

27 Janvier 2023 - 1.5.8 > [Version Ancienne]
> Version correctrice de la 1.5.7 - Modification du formulaire d'ajout d'un Slide;

30 Janvier 2023 - 1.5.9 > [Version Ancienne]
> [Fonctionnalité] > Ajout d'un slide pour chaque Diaporama;
> Modification de la structure des tables de la base de données;
> Lors de la suppression d'un diaporama, l'ensemble des slides sont supprimés;

31 Janvier 2023 - 1.5.10 > [Version Ancienne]
> [Fonctionnalité] > Affichage du chemon des slides (Début de l'affichage des slides);
> [Fonctionnalité Rétiré] > ajout d'image via le premier formulaire;
> [Ajout] > Dossiers contenants les sauvegardes de précédent codes au cas de problèmes;

31 Janvier 2023 - 1.5.11 > [Version Ancienne]
> [Bug Résolu] > Le plugin entrait en conflit avec l'API Rest;
> Affichage des slides pour chaque diaporama;
> [Fonctionnalité] > Possibilité de supprimer toutes les slides d'un diaporama sans supprimer le diaporama;
> Modification du graphisme de la page gestion des diaporamas;
> Modification du texte de description du Plugin;
> Suppression des logs contenus dans le fichier debug.log;

01 Février 2023 - 1.5.12 > [Version Ancienne]
> Modification de l'affichage de la gestion des diaporamas;
> La page "Aide" disparaît pour donner lieu à la page "Info";
La page "Info" regrouppera toutes les infos à savoir sur le Plugin (La version, la dernière mise à jour, les Framework qu'elle utilise ;etc...);

01 Février 2023 - 1.5.13 > [Version Ancienne]
> Correction de Bugs;
> Mises à jour de l'interface : possibilté de modifié la description de chaque Slide;
> L'utilisateur à désormais la possibilité de modifié le nom de son diaporama à l'infini;

02 Février 2023 - 1.6.0 > [Version Ancienne]
> [Bug résolu] > Il n'y à plus de caratères de sorties innatendues !;

02 Février 2023 - 1.6.1 > [Version Ancienne]
> [Fonctionnalité] > L'utilisateur peut désormais voir le shortcode qu'il peut utiliser pour afficher le diaporama;
> Début du shortcode;

03 Février 2023 - 1.6.2 > [Version Ancienne]
> Le shortcode affiche désormais un diaporama (plus ou moins);

06 Février 2023 - 1.6.3 > [Version Ancienne]
> Correction de l'affichage du diaporama;

06 Février 2023 - 1.6.4 > [Version Ancienne]
> Inclusion des fichiers CSS et JS de Bootstrap;

06 Février 2023 - 1.6.5 > [Version Ancienne]
> Mise à jour du diaporama : désormais, le diaporama défile automatiquement;
> [Remarque] > Le diaporama utilise la dernière version de bootstrap (5.3.0);
> Préparation futur mise à jour;

06 Février 2023 - 1.6.6 > [Version Ancienne]
> Changement du shortcode : le nom à changé pour qu'il soit plus représentatif de sa fonction;
> [Fonctionnalité] > Un nouveau shortcode à été ajouté permettant de créer un diaporama qui ne défile pas tout seul;
> Il y à désormais 2 shortcodes pour le plugin;
> Correction des diaporamas : les descriptions des images s'agglutinaient au lancement du diaporama;
> Correction des diaporamas : au lancement du diaporama, la première image restaient en place;
> Modificcation de la description du plugin;
> Nettoyage du code (suppression du code désormais inutile - on à gardé certaines fonctions au cas ou, mais elles ont été désactivé);

07 Février 2023 > 1.7.0 > [Version Ancienne]
> Passage en version Bêta : Vérification du bon fonctionnement de l'application.

09 Février 2023 > 1.8.1 > [Version Ancienne]
> Publication du plugin : Correction de divers bugs (nottament la création d'une table qui ne fonctionnait pas).

09 Février 2023 - 1.8.2 > [Version Ancienne]
C'est un grand pas dans le développement de cette extension : Un nouveau nom : **DiapoManager**;
J'ai également décidé de placer le répertoire GitHub de ce projet en libre consultation : vous pourrez vous inspirer du code ce cette extension, le copier pour développer vos propres fonctionnalités. Sachez que je continuerez à proposer de nouvelles fonctionnalités et des mises à jours correctrices de cette extension. Vous pouvez me signaler tout les bugs/Améliorations pour ce plugin dans la partie Issues de ce répertoire GitHub. Ce code restera tout de même le point initial de ce projet.
Amusez vous avec cette extension WordPress !

10 Février 2023 > 1.8.3 > [Version Ancienne]
> Ajustements et patchs de quelques bugs :
- Les images sont désormais fixé quand à leur taille

21 Février 2023 > 1.8.4 > [Version Ancienne]
> Ajout des boutons pour les liens de téléchargement des documentations;
> Téléchargement activé pour la documentation utilisateur;
> Téléchargement activé pour la documentation technique;

22 Février 2023 > 1.8.5 > [Version Ancienne]
> Modification des liens de téléchargement : le téléchargement se fait désormais via un répertoire GitHib distant GitHub;

24 Février 2023 > 1.8.6 > **[Version Actuelle]**
> Patch d'un bug majeure : L'utilisateur ne peut plus ajouter de slide si l'id du diaporama ets égal à 0;