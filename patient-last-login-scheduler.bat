@echo off
cd /d /home/yourexercises/public_html
php artisan schedule:run >> NUL 2>&1