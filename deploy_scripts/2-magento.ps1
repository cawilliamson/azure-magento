# set these parameters before doing anything else!
Set-Variable APP_EMAIL chris.williamson@ecs.co.uk
Set-Variable APP_FIRSTNAME Christopher
Set-Variable APP_LASTNAME Williamson
Set-Variable APP_PASS Pa55W0rd!
Set-Variable APP_USER admin
Set-Variable DB_PASS Pa55W0rd!
Set-Variable DB_USER app
Set-Variable NAME magentoecs

# import modules
Import-Module .\deploy_scripts\Invoke-Process.psm1

# change to web dir
Set-Location -Path ..\wwwroot

# run install steps
if (-NOT (Test-Path app\etc\local.xml)) {
  # run setup wizard
  Invoke-Process -FilePath "php" -ArgumentList `
    "bin\magento", `
    "setup:install", `
    "--admin-firstname='${APP_FIRSTNAME}'", `
    "--admin-lastname='${APP_LASTNAME}'", `
    "--admin-email='${APP_EMAIL}'", `
    "--admin-user='${APP_USER}'", `
    "--admin-password='${APP_PASS}'", `
    "--db-host='${NAME}sql.mysql.database.azure.com'", `
    "--db-name='${NAME}db'", `
    "--db-user='${DB_USER}@${NAME}sql'", `
    "--db-password='${DB_PASS}'", `
    "--no-interaction"

  # install sample data
  Invoke-Process -FilePath "php" -ArgumentList "bin\magento", "sampledata:deploy"
}
