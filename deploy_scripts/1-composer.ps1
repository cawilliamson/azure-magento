# import modules
Import-Module Invoke-Process

# fetch and run installer
Invoke-Process -FilePath "php" -ArgumentList "composer-setup.php"
Remove-Item -Force -Path composer-setup.php

# change to web dir
Set-Location -Path ..\wwwroot

# install/update composer modules
if (-NOT (Test-Path vendor\autoload.php)) {
  Invoke-Process -FilePath "php" -ArgumentList "..\repository\composer.phar", "install"
} Else {
  Invoke-Process -FilePath "php" -ArgumentList "..\repository\composer.phar", "self-update"
  Invoke-Process -FilePath "php" -ArgumentList "..\repository\composer.phar", "update"
}