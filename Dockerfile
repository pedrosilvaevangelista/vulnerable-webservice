FROM php:7.4-apache

# Instala o curl dentro do container
RUN apt-get update && apt-get install -y curl wget

# Ativa o módulo mysqli (para conexões com o banco de dados)
RUN docker-php-ext-install mysqli

# Copia os arquivos da aplicação (caso queira usar COPY)
# COPY . /var/www/html/

