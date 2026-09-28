# Mizani — État du projet

Dernière mise à jour : 2026-09-28

## Phase actuelle

Le socle technique est en place. Le projet passe maintenant à la définition du MVP et à la conception du domaine financier. Les fonctionnalités financières décrites ci-dessous constituent le périmètre approuvé de Mizani V1 ; elles ne sont pas encore implémentées.

## Référence Git

- Baseline sur `main` : commit `3c565ba`.
-- Branche de travail utilisée pour formaliser le périmètre V1 : `chore/define-mizani-mvp`.

## Socle technique réalisé

- Application Laravel 12 sur PHP 8.2, avec Laravel Breeze.
- Inscription, connexion, déconnexion, réinitialisation et confirmation du mot de passe, vérification de l'adresse e-mail et gestion du profil.
- Dashboard fourni par le socle Laravel/Breeze, sans indicateurs financiers Mizani.
- Interface fondée sur Blade, Vite, Tailwind CSS et Alpine.js.
- Fichiers de verrouillage des dépendances Composer et npm.
- Configuration de test isolée avec `APP_ENV=testing` et SQLite `:memory:`, imposée dans `phpunit.xml` et protégée par des garde-fous dans `tests/TestCase.php`.
- Dépôt Git initialisé et baseline publiée sur GitHub.
- Connexion HTTPS de PHP et Composer corrigée, avec vérification TLS maintenue.

Les migrations présentes concernent uniquement les tables standard des utilisateurs, sessions, cache et jobs. Les tests actuels couvrent principalement le socle d'authentification et le profil.

## Fonctionnalités non encore réalisées

Aucun modèle financier, aucune migration propre au domaine Mizani, aucune saisie de revenus ou de dépenses, aucun mécanisme d'épargne, aucune opération récurrente et aucun dashboard financier n'ont été implémentés. La PWA n'est pas finalisée.

## Décisions approuvées pour le MVP V1

### Produit et utilisateurs

Mizani est une application web progressive (`PWA`) de gestion du budget personnel. Son premier public est le salarié percevant un salaire mensuel fixe. Elle doit l'aider à organiser revenus, dépenses et épargne, et à suivre le montant restant pendant chaque cycle budgétaire. La devise de référence est le dirham marocain (`MAD`), l'interface V1 est en français et la saisie est manuelle.

Plusieurs utilisateurs peuvent être inscrits, mais chacun gère uniquement ses propres données financières. L'isolation repose sur une propriété directe liée à `user_id`. Chaque utilisateur dispose d'un seul compte financier en V1. Aucun rôle administratif ou équipe financière n'est prévu dans le MVP.

### Cycle budgétaire

Lors de la configuration initiale, l'utilisateur choisit entre un mois civil et un cycle allant d'une date de versement du salaire à la suivante. Les champs exacts et l'algorithme de calcul seront définis lors de la conception du domaine.

### Revenus, dépenses et catégories

- Prise en charge du salaire mensuel fixe et de revenus complémentaires saisis manuellement au besoin.
- Saisie séparée de chaque dépense fixe, ainsi que des dépenses variables.
- Catégories prédéfinies que l'utilisateur peut personnaliser.
- Historique des opérations avec filtres.

### Opérations récurrentes

L'utilisateur pourra définir une opération récurrente et sa date d'échéance. Une notification signalera l'échéance. L'opération ne sera jamais inscrite automatiquement dans l'historique ni intégrée au solde : l'utilisateur devra la confirmer avant sa comptabilisation.

### Épargne

L'utilisateur choisira un montant fixe ou un pourcentage de son salaire comme méthode d'épargne. Une épargne générale sera disponible sans objectif obligatoire. Il pourra ajouter un ou plusieurs objectifs d'épargne facultatifs.

### Dashboard et rapports

Le périmètre prévu comprend le total des revenus, le total des dépenses, le montant épargné, le montant restant, la répartition des dépenses par catégorie, le suivi du cycle courant, l'historique filtrable et des rapports financiers simples. Il ne comprend pas de comptabilité professionnelle avancée.

## Hors périmètre V1

- Connexion directe aux comptes bancaires et import bancaire automatique.
- Intelligence artificielle.
- Application React Native ou application native distincte.
- Multi-tenancy, `organizations` et `members`.
- Plusieurs comptes financiers pour un même utilisateur et transferts entre comptes.
- Comptabilité d'entreprise.
- Synchronisation financière complexe hors ligne.
- Rôles et permissions multiples.

Une architecture permettant éventuellement plusieurs comptes à l'avenir peut être étudiée pendant la conception ; leur prise en charge ne fait pas partie du MVP actuel. Aucun nom de table ou de champ métier n'est définitif à ce stade : le schéma sera conçu séparément.

## Prochaines étapes, dans l'ordre

1. Entretenir les dépendances et vérifier le baseline technique.
2. Concevoir le domaine et les règles de calcul, notamment le cycle budgétaire et les soldes.
3. Concevoir la base de données après validation du domaine.
4. Réaliser la configuration initiale de l'utilisateur.
5. Réaliser les catégories, le compte unique et la saisie des opérations.
6. Réaliser les opérations récurrentes et leur confirmation.
7. Réaliser l'épargne générale et les objectifs facultatifs.
8. Réaliser le dashboard et les rapports simples.
9. Finaliser la PWA.
10. Préparer la qualité, la sécurité et le déploiement.

## Règles de travail

- Utiliser une branche distincte pour chaque étape, avec des commits petits et explicites.
- Exécuter les tests avant chaque commit, exclusivement sur la configuration de test isolée ; ne jamais les lancer sur la base MySQL réelle.
- Ne pas publier `.env`, de secrets ni de données financières personnelles dans le dépôt.
- Ne créer aucune migration métier avant validation de la conception du domaine et de la base de données.

## Prochaine action précise

Traiter la maintenance Composer, puis exécuter les tests de référence et le build frontend. Préparer ensuite un document de conception du domaine et des règles de calcul. Les migrations métier attendront la validation de cette conception.
