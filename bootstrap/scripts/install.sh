composer install

cp .env.example .env

php artisan key:generate
php artisan storage:link

touch database/database.sqlite

php artisan migrate:fresh --seed

php artisan ide-helper:generate
