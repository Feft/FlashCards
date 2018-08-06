.PHONY: composer php7.1phpunit7 php7.2phpunit7

# Set dir of Makefile to a variable to use later
MAKEPATH := $(abspath $(lastword $(MAKEFILE_LIST)))
PWD := $(dir $(MAKEPATH))

composer:
	docker container run --rm -v $(PWD):/app composer:latest install --ignore-platform-reqs

php7.1phpunit7:
	docker container run --rm -v $(PWD):/app stjw/phpunit:php7.1-phpunit7 --testdox --colors=always

php7.2phpunit7:
	docker container run --rm -v $(PWD):/app stjw/phpunit:php7.2-phpunit7 --testdox --colors=always
