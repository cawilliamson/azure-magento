#!/bin/sh

# fetch and run installer
curl -s https://getcomposer.org/installer | php

# change to web dir
cd ../wwwroot

# move composer.json in to place (used to skip azure site extension - breaks install)
mv composer.skipauto.json composer.json

# install/update composer modules
if [ ! -f ./vendor/autoload.php ]; then
  php ../repository/composer.phar install
else
  php ../repository/composer.phar update
fi
