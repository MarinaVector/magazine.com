# в .env файле прописываем 

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=magazines
DB_USERNAME=root
DB_PASSWORD=password

# собираем app
docker-compose build app

# project_dir - директория с проектом на хосте. Команда запускает sh в только что собранном имейдже 
docker run -v {project_dir}:/app --rm magazinecom_app:latest sh 

# выполняем команды по очереди
composer install 
php artisan key:generate 
php artisan config:cache
php artisan migrate
exit

# далее поднимаем все окружение
docker-compose up
 
