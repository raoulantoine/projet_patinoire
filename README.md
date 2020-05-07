Installation :
`composer create-project 
 symfony/website-skeleton my_project_name`

Bootstrap :
`npm i bootstrap `

Font-Aweseome 

`npm i font-awesome`

Lancer le serveur

`npm start` , `npm run watch`
`symfony serve`

CSS / JavaScript :
`composer require symfony/webpack-encore-bundle`
`npm install`

Créer la bdd `php bin/console doctrine:database:create` 
Créer un fichier : .env.local et copier qui est dans le .env


Décommenter dans webpack.config  : .enableSassLoader() et renommer dans asset app.css en app.scss

Installation de SASS : `npm install sass-loader@^7.0.1 node-sass --save-dev`

Page d'accueil 
`php bin/console make:controller DefaultController`

