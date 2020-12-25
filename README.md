docker-compose build app
docker run -v {project_dir}:/app --rm magazinecom_app:latest sh 

in .env file 

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=magazines
DB_USERNAME=root
DB_PASSWORD=password



composer install && php artisan key:generate && php artisan config:cache && php artisan migrate

 
