FROM php:8.3-cli-bookworm

COPY . /usr/src/myapp
WORKDIR /usr/src/myapp

EXPOSE 9090
CMD [ "php","-S","127:0.0.1:9090" ]
