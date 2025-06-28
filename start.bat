@echo off

echo SERVICOS
docker-compose up -d
echo.
docker-compose ps

echo.
echo LOCALHOST - http://localhost:8081
echo PHPMYADMIN - http://localhost:8082
echo Tudo rando ok
start chrome "http://localhost:8081"
echo.

pause