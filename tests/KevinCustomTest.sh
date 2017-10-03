echo "###############Database Migrations"
php artisan migrate:refresh --seed
echo "###############PHPUnit Tests"
vendor/bin/phpunit -c phpunit.xml
echo "###############Dusk Browser Testing"
php artisan dusk
