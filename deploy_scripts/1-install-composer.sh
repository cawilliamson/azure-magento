#!/bin/sh

# fetch and run installer
curl -s https://getcomposer.org/installer | php

# change to web dir
cd ../wwwroot

# install composer modules
php ../repository/composer.phar install
