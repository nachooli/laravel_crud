up:
	docker-compose up -d --build

down:
	docker-compose down

setup:
	docker-compose up -d --build
	docker exec -it laravel_crud_app composer install
	docker exec laravel_crud_app cp .env.example .env || true
	docker exec laravel_crud_app php artisan key:generate
	docker exec laravel_crud_app php artisan db:wipe
	docker exec laravel_crud_app php artisan migrate
	docker exec laravel_crud_app php artisan db:seed

test:
	docker exec -it laravel_crud_db mysql -u root -proot -e "CREATE DATABASE IF NOT EXISTS laravel_test;"
	docker exec laravel_crud_app php artisan test

generate-migrations:
	docker exec laravel_crud_app sh -c "rm -f database/migrations/*.php"
	docker exec -it laravel_crud_app php artisan migrate:generate --no-interaction
