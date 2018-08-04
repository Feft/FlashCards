.PHONY: composer php7.1phpunit7 ls

ls: 
	ls -la

composer:
	docker container run --rm -v $(pwd):/app composer:latest install --ignore-platform-reqs

php7.1phpunit7:
	docker container run --rm -v $(pwd):/app stjw/phpunit:php7.1-phpunit7 --testdox --colors=always

