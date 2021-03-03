#!/bin/bash

echo -e "\n\xF0\x9F\x97\x84  Creating DB...\n"

# Drop lab DB if it exists, (re)create it, and create content_dev user
docker exec -i content_db mysql -e "DROP DATABASE IF EXISTS content_dev"
docker exec -i content_db mysql -e "CREATE DATABASE content_dev;"
docker exec -i content_db mysql -e "CREATE USER IF NOT EXISTS content_dev@localhost IDENTIFIED BY 'content_dev';"
docker exec -i content_db mysql -e "GRANT ALL ON content_dev.* TO 'content_dev'@'%' IDENTIFIED BY 'content_dev';"
docker exec -i content_db mysql -e "GRANT ALL ON content_dev.* TO 'content_dev'@'content-dev_default' IDENTIFIED BY 'content_dev';"
docker exec -i content_db mysql -e "FLUSH PRIVILEGES;"
docker exec -i content_db mysql --database=content_dev < wordpress/content_dev.sql

echo -e "\xE2\x9C\x94  DB created.\n"