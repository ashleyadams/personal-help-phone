#!/bin/bash

if [[ "$OSTYPE" == "msys" ]];
then
    # use winpty on windows
    winpty docker exec -it -w //var/www/html webserver-phpd composer install
else
    docker exec -it -w /var/www/html webserver-phpd composer install
fi
