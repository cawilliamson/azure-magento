REM run composer installer
php composer-setup.php
DEL composer-setup.php

REM change to web dir
cd ..\wwwroot

REM install/update composer modules
IF NOT EXIST vendor\autoload.php (
  php ..\repository\composer.phar install
) else (
  php ..\repository\composer.phar self-update
  php ..\repository\composer.phar update
)
