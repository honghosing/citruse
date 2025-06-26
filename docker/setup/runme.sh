#!/bin/sh
set -e  # Exit immediately if any command fails

cd /var/www/html

#installing dependancies
npm install
composer install