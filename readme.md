==== Plugin ChasseAvenir87 ====
Développé par : Guillaume PASCAIL
Date création : 10 Janvier 2023
Version 1.3.1 - 18 Janvier 2023

===== Historique des Mises à jours =====

10 Janvier 2023 - 1.1.0 > [Version Ancienne]
> Création du menu et ajout de la futur page du Panel admin

12 Janvier 2023 - 1.1.1 > [Version Ancienne]
> Ajout du shortcode [carrousel] qui permettra d'intégrer le futur caroussel.

13 Janvier 2023 - 1.1.2 > [Version Ancienne]
> Ajout du premier formulaire dans le Panel Adminstrateur
> Ajout : Lorsque que l'utilisateur active le plugin, cela vérifie si la table nécessaire au fonctionnement du plugin est présente dans la base de données.
> Si elle est non présente, celui-ci la créer avec tout les champs nécessaire.
> Si elle est présente, le plugin n'est censé ne rien faire.
> Modification structure sur la table insérer (ajout d'un champs supplémentaires : poidsImage et modification de structure sur dateAjout et dateSupression qui sont passé en datetime)
> Ajout d'une fonction de suppression de la table après la désinstallation du plugin [en test]

16 Janvier 2023 - 1.1.3 > [Version Ancienne]
> Ajout d'un sous menu
> Ajout d'une page qui servira à gérer les images importés par l'utilisateur
> Correction du bug qui supprimé le menu Outils et EditComments

16 Janvier 2023 - 1.2 > [Version Ancienne]
> Ajout du sous-menu Aide
> Ajout du sous-menu Gérer les caroussels
> Correction du bug de l'affichage de la page aide
> Modification du code de l'éxécution du plugin (création d'une nouvelle table) => /!\ Bug : la table ne se créer pas mais n'a aucune incidence sur le fonctionnement actuel du plugin
> Bug de l'affichage du sous-menu "Gérer les caroussels" régler
> Bug qui afficher un message d'erreur sur la variable $wpdb résolu
> Ajout de la possibilité d'ajouter des images dans la base de données 
> Correctif de l'ajout de l'image dans la médiathèque
> Correctif du bug d'insertion de l'image dans la base de données
> Correction de bug mineurs
> Modification de la structure de la table spécifique pour le plugin
> Récupération de l'id de la médiathèque fonctionnel
> Regroupement patchs entre eux pour plus de lisibilité
> Ajout d'image pour les messages d'erreur ou de succés
> Modification de la description du plugin

17 Janvier 2023 - 1.2.1 > [Version Ancienne]
> Autorisation des fichiers en .svg pour l'importation des fichiers
> Ajout d'une Pop-Up pouvant se fermer lorsque le fichier n'est pas compatible
> Ajout d'une Pop-Up pouvant se femer lorsque le fichier est téléversé.

17 Janvier 2023 - 1.2.2 > [Version Ancienne]
> Patch du formulaire d'insertion

17 Janvier 2023 - 1.3 > [Version Ancienne]
> Le Glisser-Déposer sur le formulaire d'insertion est désormais fonctionnel
> Modification du texte sur le formulaire de téléchargement
> Opacité sur l'image de téléversement réglé
> Changement du logo de l'onglet
> Modification et Ajouts de texte déjà existants ou non existants

18 Janvier 2023 - 1.3.1 > [Version Actuelle]
> Correction d'un bug critique de fonctionnement : l'insertion dans la base de données ne fonctionnait plus

?? Janvier 2023 - 1.4 > [Version Future]
> Correction du bug qui empêchait la création de la deuxième table de la base de données
> 








?? ?? 2023 - ??? > [Version Futur]
> Changement du nom du Plugin : ???