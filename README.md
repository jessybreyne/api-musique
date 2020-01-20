# API Musique

## Introduction

Travail universitaire, project PHP, réalisation d'un CRUD en symfony de gestion de musique avec une API. Et un client SPA, dans notre cas en React.

## Installation

Installation des dépendances en PHP
```
composer install
```
Création et initialisation de la base de données
```
php bin/console doctrine:database:create
```
```
php bin/console make:migration
```
```
php bin/console doctrine:migrations:migrate
```
On lance le projet symfony
```
symfony serve
```