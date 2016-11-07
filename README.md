Project 6 N.A.O

! Require last Node version and php7 to work !
    
    Install:
        
        git clone projet;
        -composer install;
        
        -define access to database;
        
        -php bin/console doctrine:database:create;
        
        -php bin/console doctrine:schema:update --dump-sql;
        
        -php bin/console doctrine:schema:update --force;
        
        -php bin/console doctrine:fixtures:load; and press Y;
        
        -npm install;
        
        -npm run build;
        
        -open a new terminal (do not close the current)
        
        -php bin/console server:start;
        
        -npm run start;
 