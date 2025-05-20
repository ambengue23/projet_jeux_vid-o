# Projet- L’Atelier des Jeux

L'atelier des jeux est une société spécialisée dans la création de
jeux (jeux vidéo, jeux de plateau, jeux de rôle, jeu de carte ...),
embauchant plus d’une cinquantaine de personnes.
Nous venons d'être pris en stage par la société : L’atelier des jeux.
Nous avons intégré le service de maintenance informatique et d’aide
aux utilisateurs.
Notre tuteur s’étant intéressé à notre formation et son contenu
(polyvalent, réseau et développement), il nous à pris en stage pour, en plus de nos
missions de maintenances opérationnelles, réaliser un logiciel de demande d’assistance.

## Le projet

![Capture d’écran du 2025-05-20 13-41-56](https://github.com/user-attachments/assets/a84614e7-2bdf-4e7c-a778-ce8f057fa5c6)

# Projet de Gestion d'Assistance Utilisateur

Ce projet est une application web destinée à faciliter la gestion des demandes d’assistance des utilisateurs. 
Il comprend un système de tickets, une interface pour les techniciens, une page d'administration et diverses
fonctionnalités de sécurité et de journalisation. Le tout est présenté dans une interface responsive et soignée.

---

## Fonctionnalités principales

### Page d’accueil
- Présentation des services disponibles.
- Redirection vers le formulaire de demande d’assistance.

  ![acceuil](https://github.com/user-attachments/assets/8a67e87a-cc29-4097-946c-bb8c5ef63458)


### Demande d’assistance
- Formulaire avec menu déroulant pour catégoriser le problème (ex : réseau, logiciel, matériel, etc.).
- Saisie des détails de la demande par l'utilisateur.

  ![assistance](https://github.com/user-attachments/assets/c892e81f-9070-408e-b281-412aa8cd415c)


### Authentification
- Connexion via identifiants login/mot de passe.
- Accès sécurisé pour les techniciens et les administrateurs.

![securité](https://github.com/user-attachments/assets/577446c9-a2dd-4d62-9406-04f88fd879e7)


###  Gestion des tickets
- Tableau de bord listant les tickets avec couleurs selon leur statut :
  - 🔴 Ticket fermé
  - 🟡 Ticket en cours
  - 🟢 Ticket ouvert

   ![couleur ticket1](https://github.com/user-attachments/assets/8010a2fd-c060-4a54-9b89-e31c285e883e)

  ![couleur ticket2](https://github.com/user-attachments/assets/1d2171c7-d439-462c-9828-49546a1daf41)


- Tri par type de demande.
 
![filtre](https://github.com/user-attachments/assets/124fc574-0894-4724-93f3-eeb0e61767b3)

- Modification du statut en un clic depuis le panneau d’administration.

 ![modit stat ticket](https://github.com/user-attachments/assets/f63c3c35-1d9b-450d-b221-d5e0ad8cf138)


### Détail d’un ticket
- Page dédiée pour consulter et modifier un ticket.
- Affichage des informations : utilisateur, type de demande, description, statut, date de création.

![modit_satatut_ticket](https://github.com/user-attachments/assets/fa90bf0b-31ac-47ff-b98e-5e388c950461)

### Création de compte technicien
- Formulaire de création sécurisé pour ajouter de nouveaux techniciens.

![créer technicien](https://github.com/user-attachments/assets/5d9c95c3-8bac-4ef4-bfc5-ca073968a5ff)


## Fonctionnalités supplémentaires

- Système de **logs** : suivi des actions (création, modification, suppression de tickets, connexions…).
- **Sécurité** :
- Authentification sécurisée (hash des mots de passe).

![mdp_hacché](https://github.com/user-attachments/assets/5053530b-8899-42f2-982d-cf8e89572b2f)

  




