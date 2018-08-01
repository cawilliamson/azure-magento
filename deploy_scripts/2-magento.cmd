REM set these parameters before doing anything else!
set APP_EMAIL=chris.williamson@ecs.co.uk
set APP_FIRSTNAME=Christopher
set APP_LASTNAME=Williamson
set APP_PASS=Pa55W0rd!
set APP_USER=admin
set DB_PASS=Pa55W0rd!
set DB_USER=app
set NAME=magentoecs

REM change to web dir
CD ..\wwwroot

REM run install steps
IF NOT EXIST app\etc\local.xml (
  REM reset env file
  DEL app\etc\env.php
  
  REM run setup wizard
  php bin\magento setup:install --admin-firstname="%APP_FIRSTNAME%" --admin-lastname="%APP_LASTNAME%" --admin-email="%APP_EMAIL%" --admin-user="%APP_USER%" --admin-password="%APP_PASS%" --db-host="%NAME%sql.mysql.database.azure.com" --db-name="%NAME%db" --db-user="%DB_USER%@%NAME%sql" --db-password="%DB_PASS%" --no-interaction

  REM install sample data
  php bin\magento sampledata:deploy %APP_USER%
)
