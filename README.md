# HBG Exercise

Ce projet est une application web fullstack composée d’un backend Laravel (PHP) et d’un frontend moderne (Vite + Vue.js).

**Objectif technique :**

-   Implémenter un CRUD basique (Create, Read, Delete) pour la gestion des pilotes ("pilots")
-   Affichage des pilotes dans une liste paginée côté frontend
-   Formulaire de création de pilote avec validation
-   API RESTful exposée par Laravel pour toutes les opérations CRUD
-   Utilisation de migrations, seeders et modèles Eloquent pour la persistance
-   Frontend en Vue.js consommant l’API via des services dédiés

## Structure du projet

-   `backend/` : API Laravel (PHP)
-   `frontend/` : Application frontend (Vue.js)

---

## Prérequis

-   PHP >= 8.1
-   Composer
-   Node.js >= 18
-   pnpm (ou npm/yarn)

---

## Initialisation du projet (tout-en-un)

Après avoir installé les dépendances du backend et du frontend (voir ci-dessous), vous pouvez lancer les deux services en une seule commande :

```bash
npm install # à la racine du projet (installe aussi 'concurrently')
npm run dev
```

Cela démarre :

-   Le backend Laravel sur http://localhost:8000
-   Le frontend Vue.js sur http://localhost:5173

---

## Initialisation du Backend (Laravel)

```bash
cd backend
composer install
cp .env.example .env # (si le fichier existe)
php artisan key:generate
php artisan migrate --seed
```

## Initialisation du Frontend (Vue.js + Vite)

```bash
cd frontend
pnpm install # ou npm install
```

---

## Accès

-   Frontend : http://localhost:5173
-   Backend API : http://localhost:8000

---

## Notes

-   Assure-toi que la base de données SQLite (`backend/database/database.sqlite`) existe.
-   Les migrations et seeders sont lancés automatiquement avec `php artisan migrate --seed`.
-   Modifie les fichiers `.env` si besoin pour la configuration locale.

---
