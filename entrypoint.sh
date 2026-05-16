#!/bin/bash

# Create storage link
php artisan storage:link --force

# Run migrations first
php artisan migrate --force

# Optimize for production
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Execute the main container command
exec "$@"
