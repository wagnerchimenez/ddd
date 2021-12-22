up:
	composer install
	make psalm
	make cs
	make cbf
	make test

psalm:
	./vendor/bin/psalm

cs:
	./vendor/bin/phpcs src --standard=PSR12

cbf:
	./vendor/bin/phpcbf src --standard=PSR12

test:
	./vendor/bin/phpunit tests --colors=auto --whitelist src/ --coverage-html coverage/