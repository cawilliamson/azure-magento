#!/bin/sh

# download composer
curl https://getcomposer.org/installer --output composer-setup.php

# install composer
php composer-setup.php

# change to web dir
cd ../wwwroot

# install composer modules to web dir
php ../repository/composer.phar install
