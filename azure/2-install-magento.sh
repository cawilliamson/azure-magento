#!/bin/sh

# change to web dir
cd ..\wwwroot

# run install steps
if [ ! -f ./app/etc/local.xml ]; then
  # run setup wizard
  php bin\magento setup:install \
    --admin-firstname="Christopher" \
    --admin-lastname="Williamson" \
    --admin-email="chris.williamson@ecs.co.uk" \
    --admin-user="admin" \
    --admin-password="Pa55W0rd!" \
    --db-host="magentoecssql.mysql.database.azure.com" \
    --db-name="magentoecsdb" \
    --db-user="app@magentoecssql" \
    --db-password="Pa55W0rd!" \
    --no-interaction

  # install sample data
  php bin\magento sampledata:deploy
fi
