FROM php:8.2-apache

# Устанавливаем нужные расширения PHP
RUN docker-php-ext-install pdo pdo_mysql

# Устанавливаем Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Копируем проект в контейнер
COPY . /var/www/html

# Устанавливаем права на папки
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Устанавливаем Node.js и npm
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# Устанавливаем зависимости с помощью Composer
RUN composer install

# Устанавливаем зависимости с помощью npm и запускаем сборку
WORKDIR /var/www/html
RUN npm install
RUN npm run build

# Запуск Laravel команд (может быть перенесено в entrypoint)
# RUN php artisan migrate --force
# RUN php artisan key:generate

# Указываем порт, который контейнер будет слушать
EXPOSE 80

# Указываем рабочую директорию
WORKDIR /var/www/html
