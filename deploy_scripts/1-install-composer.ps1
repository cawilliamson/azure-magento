# fetch and run installer
Start-Process -FilePath "php" -PassThru -Wait -ArgumentList "composer-setup.php"
Remove-Item -Force -Path composer-setup.php

# change to web dir
Set-Location -Path ..\wwwroot

# install/update composer modules
if (-NOT (Test-Path vendor\autoload.php)) {
  Start-Process -FilePath "php" -PassThru -Wait -ArgumentList "..\repository\composer.phar", "install"
} Else {
  Start-Process -FilePath "php" -PassThru -Wait -ArgumentList "..\repository\composer.phar", "self-update"
  Start-Process -FilePath "php" -PassThru -Wait -ArgumentList "..\repository\composer.phar", "update"
}
