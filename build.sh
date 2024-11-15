#!/bin/bash
#migrate Configuration Loading
cd /var/www/html/orderific-website-ui && php artisan migrate
#Optimizing Configuration Loading
cd /var/www/html/orderific-website-ui && php artisan config:cache
#Optimizing Route Configuration
cd /var/www/html/orderific-website-ui && php artisan route:cache
#Optimizing View Loading
cd /var/www/html/orderific-website-ui && php artisan view:cache
#Optimizing Cache Loading
cd /var/www/html/orderific-website-ui && php artisan cache:clear
#Optimizing Cache Loading
cd /var/www/html/orderific-website-ui && sudo php artisan optimize:clear
