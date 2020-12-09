start:
	heroku local -f Procfile.dev

setup:
	composer install
	cp -n .env.example .env
	php artisan key:gen --ansi
	touch database/database.sqlite || true
	php artisan migrate
	npm install

watch:
	npm run watch

migrate:
	php artisan migrate

console:
	php artisan tinker

test:
	php artisan test

deploy:
	git push heroku

install:
	composer install

update:
	composer dump-autoload

lint:
	composer run-script phpcs -- --standard=PSR12 app routes

phpfix:
	composer run-script phpcbf -- --standard=PSR12 app routes

testphp:
	composer run-script phpunit tests
