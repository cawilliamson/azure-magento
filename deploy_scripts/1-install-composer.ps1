# fetch and run installer
Invoke-WebRequest -Uri https://getcomposer.org/installer -OutFile composer-setup.php
php composer-setup.php
Remove-Item -Path composer-setup.php -Force

# change to web dir
Set-Location -Path ..\wwwroot

# install/update composer modules
if (-NOT (Test-Path vendor\autoload.php)) {
  php ..\repository\composer.phar install
} Else {
  php ..\repository\composer.phar update
}
