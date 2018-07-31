#!/bin/sh

# fetch and run installer
curl -s https://getcomposer.org/installer | php

# change to web dir
cd ../wwwroot

# move composer files in to place (used to skip azure site extension - breaks install)
mv composer.skipauto.json composer.json
mv composer.skipauto.lock composer.lock

# install/update composer modules
if [ ! -f ./vendor/autoload.php ]; then
  php ../repository/composer.phar install
else
  php ../repository/composer.phar update
fi
