# Challenge PHP

Nous avons vu du CRUD avec l'activité [randonnée](https://github.com/SimplonReunion/php-mysql-crud).

Certains actions du CRUD ne doivent pas être accessibles par n'importe qui : comme la mise à jour, la création et la suppression.

Dans ce challenge, nous allons mettre en place une protection sur nos pages *create.php, update.php, delete.php* de l'activité [randonnée](https://github.com/SimplonReunion/php-mysql-crud), pour laisser l'utilisation de ces fonctionnalités uniquement à des personnes enregistrées en base de données (les utilisateurs de confiance).

# Préparation
Importez les fichiers PHP et les fichiers CSS que vous avez écris lors de l'exo précédent ( exo sur les randonnées ).

# Comment ça marche

Avant tout, sachez que pour pouvoir faire cela, il faudra savoir utiliser les sessions en PHP. 
Ce [petit tutoriel](http://www.lephpfacile.com/cours/18-les-sessions) vous explique comment fonctionne les sessions et aussi le principe d'une page connexion et de déconnexion.

# Insérer des utilisateurs

Pour s'identifier, il faut déjà avoir des utilisateurs en base de données.

Avec phpmyadmin, ajoutez des utilisateurs en base de données.

# Protections des pages

Au début de chaque page *create.php*, *update.php*, *delete.php* vérifiez que l'utilisateur soit connecté.

Pour faire cela c'est très simple. En se connectant vous avez dû enregistrer les informations de l'utilisateur dans une variable de session. 
Il suffit maintenant d'aller vérifier que la variable de session existe pour savoir si l'utilisateur est valide !

TIPS : Créer une fonction pour pouvoir la réutiliser au début de chaque pages concernées

> C'est un peu léger comme protection mais c'est pour que vous compreniez le principe.

# ALLER PLUS LOIN

Si vous regardez en base de données vous verrez que les mots de passes sont stockés en "clair" on peut les lire. Pas top pour la sécurité.
Il va falloir crypter le mot passe ! Sachez qu'il y a des fonctions faites pour ça. On va utiliser la fonction [sha1()](http://php.net/manual/fr/function.sha1.php)

Il faudra crypter le mot de passe dans la base de données.
Pour obtenir un mot de passe encodé au bon format sans vous soucier de quoi que ce soit, vous pouvre utiliser la fonction native password_hash() de PHP.
Pour vous faciliter le travail lors de l'ajout de vos utilisateurs, je vous ai fourni un fichier 'passwordGen.php' permettant de générer un mot de passe. Une fois affiché avec le echo, vous n'aurez qu'a le copier dans le champs password de votre nouvel utilisateur.

Vous allez me dire qu'il y a un problème. Car lors de la connexion de l'utilisateur on compare le mot de passe avec ce qu'il y a dans le champ *password* de notre base de données 
et c'est clairement plus la même chose.

Vous avez raison. C'est pourquoi, lors de la connexion, on utilise la fonction PHP password_verify qui retourne true si le mot de passe stocké en clair correspond au mot de passe crypté.
Je vous ai mis un exemple dans le fichier 'database/passwordGen.php'


Par exemple :

```php
//request to find the user in database
$req = $bdd->prepare('SELECT * FROM user WHERE username = :username ');
//$username and $password are variable you got from the login form
$req->bindParam(':username', $username);
if($req->execute()) {
    $userData = $req->fetch();
    if(password_verify($password, $userData['password'])) {
        // Mon mot de passe est bon, on peut enregistrer en session.
    }
    else {
        echo "Le mot de passe utilisé ne semble pas être correct, ou aucun compte associé à ce nom d'utilisateur";
    }
}
else {
    echo "Aucun compte associé à ce nom d'utilisateur";
}
```
