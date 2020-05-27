Installation :
`composer create-project 
 symfony/website-skeleton my_project_name`


Lancer le serveur

`npm start` , `npm run watch`
`symfony serve`

JS/Bootstraps/Jquery/fontawesome
`npm install popper.js@^1.14.3 --save
 npm install jquery@3.3.1 --save
 npm install bootstrap@4.1.1 --save
 npm install --save-dev @fortawesome/fontawesome-free`
 

Créer la bdd `php bin/console doctrine:database:create` 
Créer un fichier : .env.local et copier qui est dans le .env


Dé-commenter dans webpack.config  : .enableSassLoader() et renpmnommer dans asset app.css en app.scss

Installation de SASS : `npm install sass-loader@^7.0.1 node-sass --save-dev`

Page d'accueil 
`php bin/console make:controller DefaultController`

Creation des entités + relation :
`php bin/console make:entity `

Mettre en place la BDD : `php bin/console make:migration
                  php bin/console doctrine:migrations:migrate`
                  
                  
Mise en place des Fixtures                
`composer req --dev orm-fixtures`
 
 Créer une fixture 
`php bin/console make:fixtures `
 
 
 
 Modification dans le dossier fixture puis verifier avec `php bin/console doctrine:fixtures:load
`
Page d'inscription 
`php bin/console make:auth`

Page de connexion 
`php bin/console make:registration-form`
               
