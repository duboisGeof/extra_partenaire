#!/bin/sh
sudo chmod -R 777 app
sudo php app/console assets:install --env=dev
sudo php app/console assetic:dump --env=dev
sudo php app/console assets:install --env=prod
sudo php app/console assetic:dump --env=prod