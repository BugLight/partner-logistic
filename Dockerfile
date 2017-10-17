FROM node:8.1 as frontend_build

WORKDIR /usr/src

COPY frontend/package*.json ./
RUN npm i

COPY frontend ./
RUN npm run build

FROM composer:latest as composer_deps

WORKDIR /usr/src

COPY app/composer.lock .
COPY app/composer.json .
RUN composer install

FROM php:7.0-apache

WORKDIR /var/www/html

COPY app/src ./
COPY --from=composer_deps /usr/src/vendor ./vendor/
COPY --from=frontend_build /usr/src/dist ./
