up:
	docker-compose up -d --build

down:
	docker-compose down

setup:
	docker-compose up -d --build
	docker exec -it laravel_crud_app composer install
	docker exec laravel_crud_app cp .env.example .env || true
	docker exec laravel_crud_app php artisan key:generate
