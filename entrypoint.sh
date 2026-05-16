#!/bin/bash

# Clear cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Run migrations
# The --force flag is required for production
php artisan migrate --force

# Execute the main container command
exec "$@"
