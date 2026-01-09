#!/bin/bash

# تشغيل المهاجرة تلقائياً عند إقلاع السيرفر
php artisan migrate --force

# تشغيل الأباتشي (السيرفر)
apache2-foreground