# Mizani

Mizani est une application web progressive (`PWA`) de gestion du budget personnel. Sa première version vise les salariés percevant un salaire mensuel fixe : elle les aidera à organiser leurs revenus, leurs dépenses et leur épargne, puis à suivre ce qui reste dans chaque cycle budgétaire.

## État du projet

Le socle Laravel/Breeze, l'authentification et la gestion du profil sont présents. Les fonctions financières de Mizani n'ont pas encore été développées ; le dashboard actuel est celui du socle. La définition du MVP est approuvée et la conception du domaine constitue la prochaine étape produit.

## Public et périmètre du MVP V1

La première version cible l'usage personnel d'un salarié rémunéré chaque mois à montant fixe. L'interface sera en français, la devise de référence sera le dirham marocain (`MAD`) et les données financières seront saisies manuellement. Plusieurs personnes pourront créer un compte utilisateur, chacune accédant uniquement à ses propres données par une propriété directe liée à `user_id`. Chaque utilisateur disposera d'un seul compte financier.

- **Cycle budgétaire :** choix, lors de la configuration initiale, entre le mois civil et la période allant d'une date de salaire à la suivante. Les détails des champs et du calcul restent à définir pendant la conception du domaine.
- **Revenus et dépenses :** salaire mensuel fixe, revenus supplémentaires saisis au besoin, chaque dépense fixe enregistrée séparément et dépenses variables.
- **Catégories et historique :** catégories prêtes à l'emploi et personnalisables, historique des opérations avec filtres.
- **Opérations récurrentes :** échéance et notification ; chaque opération exige une confirmation de l'utilisateur avant son inscription dans l'historique et sa prise en compte dans le solde. Aucune comptabilisation automatique.
- **Épargne :** montant fixe ou pourcentage du salaire, épargne générale utilisable sans objectif, et objectifs facultatifs pouvant être ajoutés ultérieurement.
- **Dashboard et rapports :** revenus, dépenses, montant épargné et montant restant ; répartition des dépenses par catégorie, suivi du cycle courant, historique filtrable et rapports financiers simples.

Les noms des tables et champs métier ne sont pas encore fixés. La conception de la base de données suivra celle du domaine et des règles de calcul.

## Hors périmètre V1

La connexion directe aux comptes bancaires, l'import bancaire automatique, l'intelligence artificielle, une application React Native ou native distincte, le multi-tenancy, les `organizations` et `members`, plusieurs comptes financiers par utilisateur, les transferts entre comptes, la comptabilité d'entreprise, la synchronisation financière complexe hors ligne et les rôles ou permissions multiples ne font pas partie de V1. La comptabilité professionnelle avancée n'est pas visée.

## Technologies

- PHP 8.2+ et Laravel 12 ; Laravel Breeze pour l'authentification.
- Blade, Tailwind CSS, Alpine.js et Vite pour l'interface.
- MySQL pour le développement local ; SQLite `:memory:` pour les tests.

## Prérequis locaux

PHP 8.2+, Composer, Node.js, npm et MySQL.

## Installation locale

Dans PowerShell, depuis le répertoire où installer le projet :

```powershell
git clone https://github.com/MRMDS09/mizani.git
Set-Location mizani
composer install
Copy-Item .env.example .env
php artisan key:generate
npm ci
```

Créer une base de données locale, puis renseigner sa connexion MySQL dans `.env` sans placer d'identifiants réels dans le dépôt. Initialiser les tables standard et démarrer l'application et Vite :

```powershell
php artisan migrate
npm run dev
php artisan serve
```

Exécuter les deux dernières commandes dans des terminaux distincts. Les migrations actuelles ne créent pas encore de tables financières Mizani.

## Tests

```powershell
php artisan test
```

Les tests utilisent `APP_ENV=testing` et SQLite `:memory:`. `phpunit.xml` impose ces paramètres, tandis que `tests/TestCase.php` vérifie en plus l'environnement et la connexion effective avant l'exécution. Les tests ne doivent pas être exécutés sur la base MySQL locale.

## Vérifications de qualité proposées

```powershell
vendor\bin\pint --test
composer audit --locked
npm run build
php artisan test
```

## Sécurité

Ne jamais publier `.env`, des clés, des identifiants ou des données financières personnelles dans Git. `.env.testing` est réservé aux tests ; sa clé ne doit être réutilisée ni en développement ni en production. La vérification TLS doit rester activée pour les connexions HTTPS de PHP et Composer.

## Feuille de route

Après la maintenance des dépendances et la vérification du baseline : conception du domaine et des règles de calcul, conception de la base de données, configuration initiale, catégories et opérations, récurrences, épargne, dashboard et rapports, finalisation de la PWA, puis préparation de la qualité, de la sécurité et du déploiement. Les migrations métier seront créées après validation de la conception.

L'état détaillé et les prochaines actions sont consignés dans [PROJECT_STATUS.md](PROJECT_STATUS.md).

## Licence

MIT, conformément à `composer.json`.
