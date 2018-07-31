# fetch and run installer
Invoke-WebRequest -Uri https://getcomposer.org/installer -OutFile composer-setup.php
php composer-setup.php
Remove-Item -Force -Path composer-setup.php

# change to web dir
Set-Location -Path ..\wwwroot

# install/update composer modules
if (-NOT (Test-Path vendor\autoload.php)) {
  Start-Process -FilePath "php" -Wait -ArgumentList "..\repository\composer.phar", "install"
} Else {
  Start-Process -FilePath "php" -Wait -ArgumentList "..\repository\composer.phar", "update"
}
