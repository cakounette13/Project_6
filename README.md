Project 6 N.A.O

! Require last NodeJs version and php 7 to work !
    
    Installation:
        
        - git clone projet;
        
        -composer install;
        
        -define access to database;
        
        -php bin/console doctrine:database:create;
        
        -php bin/console doctrine:schema:create
        
        -php bin/console doctrine:fixtures:load; and press Y;
        
    ouvrir terminal, se positionner sur le dossier, puis:
        
        -npm install;
        
        -npm run build;
        
        -npm run start;
        
        - ouvrir un second terminal (ne pas fermer le 1er)
        
        -php bin/console server:start;
        
    ouvrir le navigateur et saisir : 
     
     localhost:8000
     
    Avant les tests unitaires avec behat, procédure suivante :
         
            - php bin/console doctrine:database:drop --force
            
            - php bin/console doctrine:database:create
           
            - php bin/console doctrine:schema:update --force
            
            - php bin/console doctrine:fixtures:load 
              puis 'y'
 