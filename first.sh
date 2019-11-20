#!/bin/bash

# Build containers and start them!
echo "Building containers and starting them"
echo -e "\n"
echo "docker compose build & up"
docker-compose up --build --no-start && docker-compose up -d

if [ $? -ne 0 ]
then
  exit $?
fi

(
echo -e "\n\nRunning composer install, npm install and migrations...\n"
./docker/bin/composer-install.sh && ./docker/bin/run-migrations.sh
echo -e "\n\nBuild complete!!!\n"
)
