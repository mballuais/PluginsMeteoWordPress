# Plugin Météo WordPress

## Description

Le **Plugin Météo WordPress** permet d'afficher la météo actuelle d'une ville recherchée directement sur une page ou dans une zone de widgets de votre site WordPress. Ce plugin utilise l'API OpenWeatherMap avec une clé API déjà configurée, donc pas besoin d'ajouter la vôtre.
![Capture4](https://github.com/user-attachments/assets/5d306561-5c11-46ce-aedc-12210f31110e)

## Fonctionnalités

- Recherche de la météo d'une ville par nom.
- Affichage des conditions météo actuelles (température, description du temps, humidité, vent, etc.).
- Intégration facile à une page ou à un widget via l'éditeur de blocs WordPress.
- Mise à jour automatique des données météo.

## Installation

1. Téléchargez le plugin depuis ce dépôt ou clonez-le avec la commande suivante :
    ```bash
    git clone https://github.com/mballuais/PluginsMeteoWordPress.git
    ```

2. Accédez à votre tableau de bord WordPress, puis allez dans **Extensions > Ajouter**.

3. Cliquez sur le bouton **Téléverser une extension** et sélectionnez le fichier ZIP du plugin.

4. Installez et activez le plugin.
![Capture2](https://github.com/user-attachments/assets/6591140b-8763-45c8-b64d-0108891fd82a)

## Réglages du Plugin

Le plugin est préconfiguré avec une clé API OpenWeatherMap. Aucun réglage n'est nécessaire pour l'API, mais si vous souhaitez personnaliser l'affichage des données météo, vous pouvez le faire depuis les réglages du plugin.

1. Dans votre tableau de bord WordPress, allez dans **Réglages > Plugin Météo**.
   
2. Depuis cette page, vous pouvez :
    - Définir la ville par défaut à afficher si aucune recherche n'est effectuée.
    - Personnaliser l'unité de température (Celsius ou Fahrenheit).
    - Activer ou désactiver certains paramètres météo (par exemple, l'affichage de l'humidité ou de la vitesse du vent).
    ![Capture](https://github.com/user-attachments/assets/cb12be8e-b3e1-4dc0-b5b9-2dd5b3d6f745)

3. Enregistrez les modifications après chaque ajustement.

## Utilisation

### Ajouter le widget météo à une page avec l'éditeur de blocs WordPress

1. Dans votre tableau de bord WordPress, allez dans **Pages > Ajouter** pour créer une nouvelle page ou modifiez une page existante.

2. Cliquez sur le bouton **Ajouter un bloc** (icône +) dans l'éditeur de blocs.

3. Dans la barre de recherche des blocs, tapez "Météo" et sélectionnez le bloc "Plugin Météo".

4. Après avoir ajouté le bloc, vous pouvez configurer la ville dont vous voulez afficher la météo.

5. Enregistrez ou publiez la page pour que la météo s'affiche.

### Ajouter le widget météo à une zone de widgets

1. Allez dans **Apparence > Widgets**.

2. Ajoutez le widget "Plugin Météo" à la zone de widgets de votre choix (comme la barre latérale ou le pied de page).

3. Enregistrez les paramètres.

## Exigences

- WordPress 5.0 ou supérieur.
- PHP 7.4 ou supérieur.

## Contribution

Les contributions sont les bienvenues ! Si vous souhaitez améliorer ce plugin ou signaler un bug, n'hésitez pas à créer une issue ou soumettre une pull request.

## Auteur

Plugin développé par Matteo.

