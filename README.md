Projet 3 Openclassrooms dans le cadre de la prépa Développeur Fulstack

Site gbaf extranet bancaire
développé par Christophe CORNEAU avril 2020


Si vous souhaitez installer ce projet, vous pouvez télécharger le ZIP qui contient la BDD sur Github (https://github.com/ccorneau/gbaf).

Apres l'import de la base de donnée, vous pouvez configurer les accès BDD à partir du fichier : config.php

Languages utilisés :
- HTML5, CSS3
- PHP, SQL
- JS

Compétences évaluées : 
- Coder la structure d’une page web en HTML5
- Gérer les informations dans la base de données en langage SQL
- Mettre en page et en forme en utilisant le CSS
- Modéliser une base de données
- Recueillir la saisie des données utilisateur en langage PHP
- Se connecter à une base de données

Cahier des charges pour le projet : 
Rappel du contexte
Création d’un extranet mettant à disposition des ressources pour les salariés des différentes banques françaises.
Réalisation :
● développement du produit ;
● présentation de la liste des différents acteurs du système bancaire
français.
Charte graphique
● Wireframe ​et ​zoning :​ fournis par notre webdesigner​.
● Colorimétrie : choix libre s’accordant avec notre logo​.
Particularités du site
● Site responsive : possibilité de consulter le site au bureau ou en itinérance à partir de différentes supports (tablettes et smartphones).
Fonctionnalités de l’application
La structure du site sera développée en HTML5, la mise en forme et la mise en page seront faites en CSS3.
Le site sera proposé à tous les utilisateurs en situation de mobilité et/ou sédentarisés dans un bureau. Il est donc impératif de mettre en place au moins un b​ reakpoint​ pertinent.
La connexion avec la base de données s’effectuera via PDO en PHP.
Les langages PHP et SQL seront utilisés pour traiter les interactions entre le site et la base de données.
Connexion/déconnexion
● Connexion requise pour accéder aux informations du site via un UserName et un Password.
● Au chargement de la page, les champs UserName et Password prennent toute la largeur de l’écran, entre le ​header e​ t le f​ ooter​.
 ● À la première connexion, l'utilisateur peut créer son compte via une page d’inscription.
● L’utilisateur peut modifier ses informations personnelles à tout moment via la page « Paramètres du compte ».
● Champs requis sur la page d’inscription :
    ○ Nom;
    ○ Prénom ;
    ○ UserName ;
    ○ Password ;
    ○ Question secrète ;
    ○ Réponse à la question secrète.
● Si l'utilisateur oublie son mot de passe, il peut saisir son UserName et répondre à la question secrète pour en créer un nouveau.
● Quand l’utilisateur est connecté, son nom et son prénom sont indiqués dans le ​header s​ ur l’ensemble des pages.
● Un bouton « Se déconnecter » est présent dans le h​ eader​.
● Si l'utilisateur est déconnecté, il est redirigé automatiquement vers la
première page pour une nouvelle connexion via un UserName et un Password.
Utilisateur connecté
Sont présents sur la page :
● présentation succincte du GBAF ;
● liste des différents acteurs/partenaires du système bancaire français
comprenant :
    ○ logo;
    ○ titre ;
    ○ présentation de l’entreprise avec affichage de la première ligne de texte ;
    ○ bouton « Afficher la suite » (permettant d’ouvrir une nouvelle page pour chaque acteur/partenaire).
Détails de la page partenaire comprenant :
● logo;
● titre ;
● texte de description complet ;
● bouton Like/Dislike permettant de donner un avis ​(professionnel et
constructif)​ en un clic sur l’acteur/partenaire ;
● indication du nombre de Like/Dislike ;
● bouton pour poster un nouveau commentaire ;
● liste des commentaires sur cet acteur/partenaire incluant :
    ○ le prénom de l’utilisateur qui a laissé le commentaire ;
    ○ la date de publication ;
    ○ le texte.

Informations complémentaires​ : pour chaque nouveau commentaire, le prénom (de la personne connectée) et la date (du jour) seront remplis automatiquement.