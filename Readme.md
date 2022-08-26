# Mint Blog Back End

[![CI](https://github.com/DumeGrisoni/MintDev-BackEnd/actions/workflows/main.yaml/badge.svg?branch=main)](https://github.com/DumeGrisoni/MintDev-BackEnd/actions/workflows/main.yaml)

## Déployement de la base de données



## Le suivi du Projet Mint Blog

Le projet Mint Blog est venu dans l'optique de réaliser un Blog grâce aux compétences acquises lors de ma formation chez STUDI.
Afin de concrétiser ce projet j'ai découper mon travail en plusieurs parties (comme appris lors de ma formation) : 
 1. Création des Personas.
 2. Listage les besoins dans des Users Stories.
 3. Création d'un modèle de parcours utilisateur.
 4. Création d'un plan du site.
 5. Réalisation d'un modèle physique de données sur LucidChart.

### Le Back de l'application 

Pour mettre en place la partie Backend de mon application j'ai d'abord séléctionné les differentes technologies que j'allais utilisées :
- PHP pour la logique et son framework Symfony 6.
- Le Bundle ApiPlatform afin de réduire la taille des dépendances de Symfony et créer des route d'API sécurisées. 
- EasyAdmin pour le système d'administration du CRUD de l'application

S'en est suivi les étapes de réalisation de la base de données et la création des routes d'API qui allaient être consommées par l'application Next.js :
1. Création de la base de donnée et ses tables grâce à Symfony 6 et le MakerBundle.
2. Choix des Entités et des routes exposés (GET,POST...) grâce à ApiPlatform.
3. Mise en place de test unitaires pour les entités et d'une pipeline d'integration continue grâce a Github Actions et Postman pour les test sur l'API.
  