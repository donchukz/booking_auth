## Installation Guide

- clone repo.
- run composer install.
- publish custom vendor: php artisan vendor:publish --force --provider="Khsing\World\WorldServiceProvider"
- dump autoload: composer dump-autoload
- finally run php artisan world:init
- serve the application.
- done.
