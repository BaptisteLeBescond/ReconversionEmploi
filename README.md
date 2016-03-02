Procédure mise en place :
=========================

  Récapitulatif pour les flemmards (sinon, lisez Étape 1 et Étape 2) :
  --------------------------------------------------------------------
  - git clone https://github.com/BaptisteLeBescond/ReconversionEmploi.git
  - php bin/console doctrine:database:create
  - php bin/console doctrine:schema:update --dump-sql
  - php bin/console doctrine:schema:update --force
  - php bin/console fos:user:create
  - http://localhost[:port]/ReconversionEmploi/web/app_dev.php/login

  Étape 1 :
  ---------
    Faire un "git clone https://github.com/BaptisteLeBescond/ReconversionEmploi.git" dans votre dossier  "[wamp|xamp|ampps|...]/www/"

    Tester sur le navigateur l'adresse : http://localhost[:port]/ReconversionEmploi/web/app_dev.php
    Le numéro de port n'est pas forcément nécessaire.

    Vous devriez avoir un message d'erreur la première fois : An exception occured in driver: SQLSTATE[HY000] [1049] Unknown database 'reconversion'.
    Normal, il n'y a pas de base de donnée sur votre serveur local (vérifiez avec phpmyadmin).
    Pour la créer, ouvrir une console et aller dans le dossier ReconversionEmploi/, et lancez la commande :
    php bin/console doctrine:database:create

    La commande va lire le fichier "parameters.yml", donc elle va créer une base de donnée dans votre serveur local appelée "reconversion".

  Étape 2 :
  ---------
    Le bundle FOSUserBundle est installé et configuré. Ce bundle permet de créer des utilisateurs et de gérer leur connexion.
    Si vous allez sur l'adresse "http://localhost/ReconversionEmploi/web/app_dev.php/login", vous ouvrez la page de connexion. Inutile d'essayer de se connecter car, premièrement, vous n'avez pas de compte utilisateur, et deuxièmement il n'y a pas de table "user" dans la base de donnée.

    (Pour rappel, avec symfony, on ne parle pas de table, mais d'entité). Donc l'entité "User" n'est pas dans la base de donnée. Celà-dit, elle est déjà configurée dans le dossier "ReconversionEmploi/src/UserBundle/Entity/User.php". Si vous regardez ce fichier, vous verrez que l'entité "extends" BaseUser, qui correspond à l'entité User de FOSUser. Bref, un User ne détient pas seulement un id, comme on pourrait le croire, mais aussi un "username", un "email", "password", "lastlogin", "groups", "role", etc... (Vous pouvez voir tout ça dans le fichier : "ReconversionEmploi\vendor\friendsofsymfony\user-bundle\Model\User.php").

    Pour enregistrer cette entité (et toutes les autres) dans votre base de donnée, faire la commande :
    php bin/console doctrine:schema:update --dump-sql (pour vérifier la requête SQL)
    puis
    php bin/console doctrine:schema:update --force (pour lancer cette requête)

    (Je vous conseille de toujours faire un dump-sql avant un force)

    Ce qui vous intéresse ici sont l'entité User et l'entité qui concerne votre Bundle.

    Il ne reste qu'à créer votre utilisateur. Pour cela, lancez la commande :
    php bin/console fos:user:create
    Donnez un username, un email et un password et c'est parti. Vous pouvez maintenant vous connecter sur le formulaire de connexion avec les bonne données.

Procédure Symfony (créer une page) :
====================================

  Tout d'abord, essayons de travailler chacun sur son Bundle. Si quelqu'un à besoin d'intervenir sur un autre Bundle (par exemple Jennifer avec les notifications), prévenez tout le monde (sur slack par exemple) pour éviter d'écraser les modifications des autres.

  Le fichier base.html.twig
  -------------------------------------------------
    Sachez que toutes les pages du site auront des parties de code html identiques. Le DOCTYPE, le charset, les <link> CSS, les <script> JS, les balises <html> et <body>, le menu du haut (même s'il change en fonction du user.groups), le bouton "connexion/déconnexion", la date et heure, le footer, etc...
    Pour se simplifier la vie, tout ce code qu'on va retrouver dans toutes les pages sera dans le fichier "app/Resources/views/base.html.twig".

    Lorsqu'on crée une page html.twig dans un Bundle (dans le dossier Resources/views/Default/ en général), il suffit d'écrire en haut {% extends "base.html.twig" %} (c'est assez parlant, on étend le fichier base).

    Attention, un fichier qui "extends" un autre fichier ne peut pas avoir de code qui se balade dans le vide. Dans le fichier base, vous pouvez voir des {% block %}. Celà permet de délimiter des zones dans lesquels on va intégrer du code provenant des autres fichiers. Donc dans vos fichiers html.twig, il faut respécter ces block.
    Bon... c'est pas clair, mais il suffit de voir ces deux fichiers pour comprendre très vite :
    "app/Resources/views/base.html.twig" et "PlatformBundle/Resources/views/Default/index.html.twig".
    Dans index.html.twig, j'intègre dans les block body et title du contenu. Ainsi, sur la page "http://localhost/ReconversionEmploi/web/app_dev.php/", on voit bien dans le code l'intégration de index.html.twig dans base.html.twig.

    'Mais pourquoi PlatformBundle et pas BibliBundle, MessagerieBundle ou NotificationBundle ?'
    Grâce au fichier app/config/routing.yml !
    Ce fichier décide quel fichier appeler en fonction du "prefix" (du chemin url).
    Si le chemin est "/" (c'est-à-dire "http://localhost/ReconversionEmploi/web/app_dev.php/"), alors on ouvre le fichier "PlatformBundle/Resources/config/routing.yml".
    Si le chemin est "/messagerie" (c'est-à-dire "http://localhost/ReconversionEmploi/web/app_dev.php/messagerie"), alors on ouvre le fichier "MessagerieBundle/Resources/config/routing.yml".

    Mais qu'y a-t-il dans ces fichiers "routing.yml" ? Les routes (ou chemins) de vos Bundles.

  Les routes
  ----------
    (même si c'est faux, considérez que url = route = chemin)
    Le fichier app/config/routing.yml contient les routes globales du site internet. Ce fichier indique quel fichier route utiliser à telle ou telle url.

    Les fichiers route des Bundle sont dans "[NomDuBundle]/Resources/config/" et doivent s'appeler "routing.yml" (comme le fichier route global).
    La différence est que le fichier route dans le Bundle indique quel Controller utiliser (modèle MVC).

    En effet, lorsqu'on est sur une url précise, Symfony à besoin de savoir quel Controller doit être appelé. Il y a donc 3 paramètres obligatoires à préciser (il y a beaucoup d'autres paramètres obtionnels) :
    - Le nom de la route (ex : "platform_homepage")
    - Le chemin d'accès (ex : "/")
    - Le Controller à appeler (ex : "PlatformBundle:Default:index")
    Ici, le nom exacte du Controller est "indexAction" (on rajoute toujours Action à la fin du Controller), et il se situe dans le fichier "DefaultController.php".

    Le nom de la route permettra, dans nos vues, de faire des liens par route et non par url. Par exemple, <a href="{{ path('platform_homepage') }}">Accueil</a> enverra sur la route "/" avec le Controller "indexAction".

    Conclusion, si vous voulez créer une nouvelle page, il faut d'abord créer sa route. Par exemple, pour créer la page qui va lister les messages de l'utilisateur, on va créer une route telle :
    - messagerie_liste
    - /liste
    - MessagerieBundle:Default:liste (pour le Controller "listeAction")

    Pour accéder à cette page, l'url complète sera : "http://localhost/ReconversionEmploi/web/app_dev.php/messagerie/liste"
    Elle est pas belle la vie ?

    Pas encore, il reste le Controller et la Vue.

  Les Controllers :
  -----------------
    Une route appelle un Controller. Le rôle du Controller est de réaliser des fonctions, calculs, créations, suppressions, etc... pour ensuite envoyer les résultats dans une Vue.

    Dans nos Bundle il existe déjà un Controller : "DefaultController". Étant donné que notre site internet est divisé en plusieurs Bundle distincts, il n'est pas nécessaire de créer plusieurs fichiers de Controller (du genre "PlatformController", "BibliothequeController", etc...). On peut donc mettre tous nos Controllers dans ce fichier.

    Lors de la création d'un Controller, 2 choses sont essentielles :
    - Son nom (ex : "indexAction")
    - La Vue à envoyer au navigateur (ex : "PlatformBundle:Default:index.html.twig")

    C'est là que se produit le gros du travail, et je ne pourrais pas tout expliquer car c'est assez conséquent et il y a déjà des tutos sur internet selon ce que vous voulez faire.

    Celà-dit, une fonction assez commune dans le Controller est de récupérer les entités. Par exemple, pour afficher la liste des messages d'un utilisateur, je vais avoir besoin de faire des requêtes à la base de donnée pour aller chercher l'entité "Message" et en afficher tous les champs.
    Attention, je ne peux pas juste afficher tous les Messages de la base de donnée. Je n'affiche que ceux dont le destinataire est l'utilisateur actuellement connecté.

    Pour ce faire, il faut utiliser le "repository"... Bon, personnellement, je n'ai jamais cherché à savoir comment ça fonctionnait exactement, mais dans les grandes lignes, ça permet de faire des requêtes à la base de donnée.
    Dans notre fonction "listeAction" (qui est dans le Controller "MessagerieBundle/Controller/DefaultController.php"), on peut écrire :

    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('MessagerieBundle:Message');
        $allMessages = $repository->findAll();

        return $this->render('MessagerieBundle:Default:liste.html.twig', array('messages' => $allMessages));
    }

    Explications :
    $repository = $this->getDoctrine()->getRepository('MessagerieBundle:Message'); -> on va chercher l'entité "Message"

    $allMessages = $repository->findAll(); -> findAll() permet d'aller chercher toutes les instances de l'entité "Message" (donc tous les messages dans la table de la bdd). On met dans la variable $allMessages.

    return $this->render('MessagerieBundle:Default:liste.html.twig', array('messages' => $allMessages)); -> on renvoie sur la Vue "liste.html.twig", avec un paramètre messages (qui contient $allMessages).

    Résultat, on va pouvoir manipuler ces données dans notre Vue liste.html.twig. Peut-être en faisant un {% for message in messages %} par exemple ;).

    Mais ce n'est pas bon. Car là, on va chercher tous les messages de tout le monde. Ce qui nous intéresse, ce sont les messages dont le destinataire est l'utilisateur courant.
    Par chance, 3 choses le permettent : la fonction $this->getUser() qui retourne l'utilisateur courant, la fonction findBy() qui, contrairement à findAll(), retourne la liste des données selon un critère, et enfin le fait que dans l'entité Message, il y a un champ qui s'appelle "destinataire", et qui correspond à l'utilisateur destinataire du message (relation ManyToOne)

    Ainsi, je vais pouvoir écrire :

    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('MessagerieBundle:Message');
        $user = this->getUser();
        $allMessages = $repository->findBy(
          array('destinataire' => $user)
        );

        return $this->render('MessagerieBundle:Default:liste.html.twig', array('messages' => $allMessages));
    }

    On obtient bien tous les messages dont le destinataire est le user courant.
    Et on envoie ces messages dans la Vue "liste.html.twig".

  Les Vues :
  ----------
    C'est la partie la plus simple. L'url appelle un Controller, le Controller manipule des données à partir des entités (entité = Model, donc on a bien un rapport Modèle -> Controller). Le Controller renvoie ces données dans une Vue (un fichier html.twig). Et paf ! ça fait du MVC.

    Rapidement, la Vue contient du code html et du code twig (logique). Le html, tout le monde connait, le twig est ce qui va permettre de manipuler les données envoyées par le Controller.

    Par exemple, pour afficher la liste des messages sous forme d'un tableau, on peut faire :

    {% block body %}

      <table>

        <tr>
          <th>Auteur</th>
          <th>Sujet</th>
          <th>Contenu</th>
        </tr>

        <tr>
          {% for message in messages %}

            <td> {{ message.auteur }} </td>
            <td> {{ message.sujet }} </td>
            <td> {{ message.contenu }} </td>

          {% endfor %}
        </tr>

      </table>

    {% endblock %}

    Résultat, j'ai bien un tableau avec une première ligne contenant les titres des colonnes (ou label).
    Puis, pour chaque message, une ligne avec l'auteur, le sujet, et le contenu.

    Saupoudrez de bootstrap (ou blueprint bien sûr) et vous avez un truc sexy.

  =========================================

  Et voilà, nous avons bien une Route, un Controller et une Vue. La difficulté est qu'il faut créer ces 3 éléments en même temps, sinon vous aurez des messages d'erreurs. Donc il vaut mieux commencer à créer la page avec un controller très simple (juste le return), et une vue très simple elle aussi.

  Force et Honneur.