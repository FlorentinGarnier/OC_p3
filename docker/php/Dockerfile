FROM php:5.6-fpm

# install the PHP extensions we need
RUN set -ex; \
	\
	apt-get update; \
	apt-get install -y \
		libjpeg-dev \
		libpng12-dev \
                libmcrypt-dev \
                ssmtp \
	; \
	rm -rf /var/lib/apt/lists/*; \
	\
	docker-php-ext-configure gd --with-png-dir=/usr --with-jpeg-dir=/usr; \
	docker-php-ext-install gd mysqli opcache pdo_mysql json mcrypt; \
        pecl install -o -f xdebug redis \
        && rm -rf /tmp/pear \
        && echo "extension=redis.so" > /usr/local/etc/php/conf.d/redis.ini \
        && echo "zend_extension=/usr/local/lib/php/extensions/no-debug-non-zts-20131226/xdebug.so" > /usr/local/etc/php/conf.d/xdebug.ini; 
# TODO consider removing the *-dev deps and only keeping the necessary lib* packages

# set recommended PHP.ini settings
# see https://secure.php.net/manual/en/opcache.installation.php
RUN { \
		echo 'opcache.memory_consumption=128'; \
		echo 'opcache.interned_strings_buffer=8'; \
		echo 'opcache.max_accelerated_files=4000'; \
		echo 'opcache.revalidate_freq=2'; \
		echo 'opcache.fast_shutdown=1'; \
		echo 'opcache.enable_cli=1'; \
	} > /usr/local/etc/php/conf.d/opcache-recommended.ini

RUN { \
                echo '[xdebug]'; \
                echo 'xdebug.default_enable = 1'; \
                echo 'xdebug.remote_enable = 1'; \
                echo 'xdebug.remote_autostart = 0'; \
                echo 'xdebug.profiler_enable = 1'; \
                echo 'xdebug.idekey = PHPSTORM'; \
                echo 'xdebug.remote_host = 172.19.0.1'; \
                echo 'xdebug.remote_port = 9000'; \
                echo 'xdebug.remote_connect_back = 1'; \

        } >> /usr/local/etc/php/conf.d/xdebug.ini


RUN { \
        echo 'error_reporting  =  E_ALL'; \
        echo 'log_errors = On'; \
        echo 'display_errors = On'; \
        echo 'include_path = ".:/usr/share/php:/usr/local/apache2/htdocs/ws_engine"'; \
    } > /usr/local/etc/php/php.ini

CMD ["php-fpm"]
EXPOSE 9000
