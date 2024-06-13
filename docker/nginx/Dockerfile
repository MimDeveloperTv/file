FROM nginx:1.25.5-alpine
COPY . /var/www/html/
COPY ./default.conf /etc/nginx/conf.d/
EXPOSE 80
CMD ["nginx", "-g", "daemon off;"]
