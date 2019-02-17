FROM registry.gitlab.com/server_soft/php7.1_debian_jessie

######################################################################
### Install php-fpm && php extensions
######################################################################
RUN apt-get update && apt-get install --yes --force-yes -o Dpkg::Options::="--force-confdef" -o Dpkg::Options::="--force-confold" --no-install-recommends \
	php7.1-cgi \
	php7.1-curl \
	php7.1-mysql \
    php7.1-gd \
    php7.1-xml \
    php7.1-zip \
    php7.1-mbstring \
    php7.1-mcrypt \
    php-xdebug \
	&& rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

RUN \
######################################################################
### TURN ON DEBUG, ERRORS
######################################################################
    sed -i 's/display_errors = .*/display_errors = On/' /etc/php/7.1/cli/php.ini && \
    sed -i 's/display_errors = .*/display_errors = On/' /etc/php/7.1/fpm/php.ini && \
    sed -i 's/display_startup_errors = .*/display_startup_errors = On/' /etc/php/7.1/cli/php.ini && \
    sed -i 's/display_startup_errors = .*/display_startup_errors = On/' /etc/php/7.1/fpm/php.ini && \
    \
######################################################################
### php.ini configurations
######################################################################
    sed -i 's/file_uploads = .*/file_uploads = On/' /etc/php/7.1/cli/php.ini && \
    sed -i 's/file_uploads = .*/file_uploads = On/' /etc/php/7.1/fpm/php.ini && \
    sed -i 's/allow_url_fopen = .*/allow_url_fopen = On/' /etc/php/7.1/cli/php.ini && \
    sed -i 's/disable_functions = .*/disable_functions = /' /etc/php/7.1/cli/php.ini

######################################################################
### Xdebug
######################################################################
RUN echo  '                                                                   \n\
[Xdebug]                                                                      \n\
xdebug.remote_handler=dbgp                                                    \n\
xdebug.remote_enable=on                                                       \n\
xdebug.remote_autostart=on                                                    \n\
xdebug.remote_connect_back=off                                                \n\
xdebug.profiler_enable=off                                                    \n\
xdebug.remote_mode=req                                                        \n\
xdebug.idekey=PHPSTORM                                                        \n\
xdebug.remote_host=host.docker.internal                                       \n\
xdebug.remote_port=9000                                                       \n'\
>> /etc/php/7.1/cli/php.ini

RUN echo  '                                                                   \n\
[Xdebug]                                                                      \n\
xdebug.remote_handler=dbgp                                                    \n\
xdebug.remote_enable=on                                                       \n\
xdebug.remote_autostart=on                                                    \n\
xdebug.remote_connect_back=off                                                \n\
xdebug.profiler_enable=off                                                    \n\
xdebug.remote_mode=req                                                        \n\
xdebug.idekey=PHPSTORM                                                        \n\
xdebug.remote_host=host.docker.internal                                       \n\
xdebug.remote_port=9000                                                       \n'\
>> /etc/php/7.1/fpm/php.ini

# Install composer
RUN cd /var/tmp/ && curl -sS https://getcomposer.org/installer -o composer-setup.php
RUN cd /var/tmp/ && php composer-setup.php --install-dir=/usr/local/bin --filename=composer

COPY . /srv/application/

######################################################################
### Create a User with Specific Group ID
######################################################################
RUN chown -R www:www /srv/application/ && find /srv/application/ -type f -name ".*" -print0 | xargs -0 rm -r && \
    find /srv/application/ -type f -name "composer.*" -print0 | xargs -0 rm -r; \
\
\
######################################################################
### PERMSSIONS
######################################################################
\
####################################
# project
####################################
chmod 777 /srv/application/

WORKDIR /srv/application/
VOLUME /srv/application/

EXPOSE 9000
