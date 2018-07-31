#!/bin/sh

#
# NOTE:
#
# Composer files start with filenames including 'skipauto' in order to skip
# the automation enabled by the site extension "Composer". Unfortunately this
# site extension is force-enabled in our sandpit environments and cannot be
# configured to use PHP 7.1. This breaks Magento composer deployments so this
# workaround skips that stage entirely - allowing us to deploy them using this
# script which *does* use the correct PHP version.
#

# fetch and run installer
curl -s https://getcomposer.org/installer | php

# change to web dir
cd ../wwwroot

# move composer files in to place
mv composer.skipauto.json composer.json
mv composer.skipauto.lock composer.lock

# install/update composer modules
if [ ! -f ./vendor/autoload.php ]; then
  php ../repository/composer.phar install
else
  php ../repository/composer.phar update
fi
