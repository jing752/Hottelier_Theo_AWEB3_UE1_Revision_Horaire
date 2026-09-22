# Mon projet

## Explication de l'API

### EpCreneau

#### GET

On peut récupérer tous les créneaux en ne mettant aucun paramètre ; mais si on met un paramètre `name` dans l'URL, on peut retourner l'horaire d'une seule classe.

#### POST

On peut créer un créneau en envoyant un JSON sous cette forme :

{
  "classe": "classe",
  "cours": "cours",
  "jour": "jour",
  "heure_debut": "HH:MM",
  "heure_fin": "HH:MM",
  "salle": "salle"
}

#### PUT

On peut mettre à jour un créneau en envoyant un JSON sous cette forme et en fournissant l'id dans l'URL :

{
  "classe": "classe",
  "cours": "cours",
  "jour": "jour",
  "heure_debut": "HH:MM",
  "heure_fin": "HH:MM",
  "salle": "salle"
}

#### DELETE

On peut supprimer un créneau en mettant l'id dans l'URL.

### EpCours

On peut récupérer tous les cours.

#### GET

### EpClasse

#### GET

On peut récupérer toutes les classes.

## Difficultés rencontrées pendant le projet

### Reprise de PHP

Pour ma part, cela fait plus ou moins depuis mars que je n'ai pas pratiqué PHP, donc la reprise a été difficile.

### Absences

Mes absences répétées lors de l'atelier ont fait que je n'ai pas pu respecter les délais.