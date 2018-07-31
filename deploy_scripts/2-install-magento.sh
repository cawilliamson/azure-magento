#!/bin/bash

. ../setup_vars.sh

# change to web dir
cd ../wwwroot

# run install steps
if [ ! -f ./app/etc/local.xml ]; then
  # run setup wizard
  php bin/magento setup:install \
    --admin-firstname="${APP_FIRSTNAME}" \
    --admin-lastname="${APP_LASTNAME}" \
    --admin-email="${APP_EMAIL}" \
    --admin-user="${APP_USER}" \
    --admin-password="${APP_PASS}" \
    --db-host="${NAME}sql.mysql.database.azure.com" \
    --db-name="${NAME}db" \
    --db-user="${DB_USER}@${NAME}sql" \
    --db-password="${DB_PASS}" \
    --no-interaction

  # install sample data
  php bin/magento sampledata:deploy
fi
