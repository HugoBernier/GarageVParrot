# Garage V. Parrot

Ce projet est construit en utilisant Laravel et utilise Docker pour le développement local.

## Prérequis

- Docker
- PHP 8.0.2+

## Pour commencer

Suivez les étapes ci-dessous pour mettre en place le projet sur votre machine locale.

1. Clonez le dépôt :

git clone https://github.com/HugoBernier/GarageVParrot.git

2. Accédez au répertoire du projet :

cd GarageVParrot

3. Installez les dépendances avec Composer :

composer install

4. Configurez le .env :

cp .env.example .env

et modifiez le avec vos options

5. installer docker et exécutez le projet :

php artisan sail:install

puis

./vendor/bin/sail up

(Vous devrez peut-être modifier le fichier docker-compose.yml)

6. lancez les migrations

Les migrations sont trouvable dans le dossier database\migrations

php artisan migrate --seed

un seeder est présent dans database\seeders\DatabaseSeeder.php pour créer des véhicules, des avis Clients acceptés et pas encore acceptés, des formulaires de contact, les jours d'ouverture et un utilisateur admin, avec nom d'utilisateur 'admin' et mot de passe 'password'

7. Accédez à l'application

http://localhost/