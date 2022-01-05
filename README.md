REQUIREMENTS: <br>

PHP: ^8.0 <br>
Laravel: ^8.7 <br>
SQLite <br>


clone project: `https://github.com/MirikAkhmedov/task_lists.git`

via docker: <br>

`docker-compose up -d` <br>

`docker exec -it app bash` <br>

`bootstrap/scripts/install.sh`
<hr>

without docker: <br>

`composer install`

`cp .env.example .env`

`php artisan key:generate`
`php artisan storage:link`

`touch database/database.sqlite`

`php artisan migrate:fresh --seed`

`php artisan ide-helper:generate`
