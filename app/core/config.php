<?php

#Rooting beallitas


if($_SERVER['SERVER_NAME'] == 'localhost')
{

    # adatbazis config

    define('DBNAME','tappancs');

    define('DBHOST', 'localhost');

    define('DBUSER','root');

    define('DBPASS','');
    

    define('ROOT','http://localhost/mvc/public');

}else
{

     
    define('DBNAME','my_db');

    define('DBHOST', 'localhost');

    define('DBUSER','root');

    define('DBPASS','');
    
    define('ROOT','https://www.tappancs.com');

}

define('APP_NAME','TAppancs');




