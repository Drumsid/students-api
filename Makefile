#запуск докер приложений
setup:
	docker-compose up --build -d

#остановка докер приложений
stop:
	docker-compose down


install:
	docker exec -it alef-php-fpm composer install
	cp -n .env.example .env || true
	php artisan key:generate
	docker exec -it alef-php-fpm php artisan migrate

#заходим в bash
bash:
	 docker exec -it alef-php-fpm  bash

seed:
	docker exec -it alef-php-fpm php artisan migrate:fresh --seed

