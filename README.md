Une API simple pour gérer une liste de tâches avec Symfony 6 et API Platform 3 basé sur l'API de Pentiminax et modifié par Tartine-Tns pour répondre à la création de tâches.


🚀 Fonctionnalités

- 📌 Créer une tâche
- 🔄 Mettre à jour une tâche
- ❌ Supprimer une tâche
- 📋 Lister toutes les tâches
- 🔐 Gestion des permissions (à venir)



🛠️ Technologies utilisées

- Symfony (API Platform)
- Doctrine (ORM pour la base de données)
- MySQL (base de données)



📦 Installation

- Cloner le projet
  "git clone https://github.com/Tartine-Tns/tartine-symfony-api.git"
  "cd tartine-symfony-api"

- Installer les dépendances
  "composer install"
   
- Créer la base de données
  "php bin/console doctrine:database:create"
  "php bin/console doctrine:migrations:migrate"

- Lancer le serveur Symfony
  "symfony server:start"



📝 Endpoints principaux

|   Méthode    |      Endpoint     |        Description         |
|--------------|-------------------|----------------------------|
|   `GET`      | `/api/tasks`      | Récupère toutes les tâches |
|   `POST`     | `/api/tasks`      | Ajoute une nouvelle tâche  |
|   `GET`      | `/api/tasks/{id}` | Retrouve une tâche         |
|   `PUT`      | `/api/tasks/{id}` | Modifie une tâche          |
|   `DELETE`   | `/api/tasks/{id}` | Supprime une tâche         |
|   `PATCH`    | `/api/tasks/{id}` | Mettre à jour une tâche    |
