FROM node:8.1 as frontend_build

WORKDIR /usr/src

COPY frontend/package*.json ./
RUN npm i

COPY frontend ./
RUN npm run build

FROM php:7.0-apache

WORKDIR /var/www/html

COPY app/src ./
COPY --from=frontend_build /usr/src/dist ./
