🦁 Zoo Virtuel ASSAD - CAN 2025
📖 Présentation du Projet
Dans le cadre de la Coupe d’Afrique des Nations (CAN) 2025 au Maroc, le projet ASSAD propose une plateforme immersive dédiée à la faune africaine. L'objectif est de sensibiliser les supporters et les familles à la biodiversité du continent, avec une mise en avant particulière du Lion de l'Atlas.

Cette application est une refonte complète d'une version procédurale vers une architecture PHP Orientée Objet (POO) avec l'utilisation de PDO pour une gestion de base de données sécurisée.

🎯 Objectifs & Fonctionnalités
Authentification & Rôles
Système Multi-Rôles : Inscription et connexion sécurisées pour Visiteurs, Guides et Administrateurs.

Validation d'Accès : Les comptes "Guide" nécessitent une approbation manuelle de l'administrateur avant de pouvoir publier.

Expérience Visiteur
Exploration : Recherche et filtrage des animaux par habitat ou par pays d'origine.

Focus Atlas : Fiche détaillée dédiée au lion "Asaad".

Réservations : Inscription aux visites guidées avec gestion des places disponibles.

Interaction : Système de notation et de commentaires après chaque visite.

Gestion Guide
Planification : Création et modification de visites guidées (titre, prix, langue, capacité).

Parcours : Gestion des étapes successives d'une visite (ex: Zone Savane → Zone Reptiles).

Suivi : Consultation de la liste des réservations en temps réel.

Administration (Back-Office)
Gestion CRUD : Contrôle total sur les animaux, les habitats et les utilisateurs.

Statistiques : Analyse du nombre de visiteurs par pays, des animaux les plus consultés et des visites les plus populaires.

💻 Spécifications Techniques
Stack Technologique
Backend : PHP 8.x (Architecture POO).

Base de Données : MySQL via le connecteur PDO.

Sécurité : Hachage des mots de passe, requêtes préparées (anti-injection SQL) et validation par Regex.

Frontend : HTML5 / CSS3 (Respect des standards W3C).

Modélisation (UML)
Le projet s'appuie sur une conception rigoureuse comprenant :

Diagramme de Cas d'Utilisation : Interactions acteurs/système.

Diagramme de Classes : Structure des entités (Animal, Habitat, Utilisateur, VisiteGuidee, EtapeVisite, Reservation, Commentaire).