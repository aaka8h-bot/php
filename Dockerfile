# Use PHP image
FROM php:8.2-cli

# Set working directory
WORKDIR /app

# Copy bot files into image
COPY . .

# Install any PHP extensions if needed
RUN docker-php-ext-install curl

# Expose HTTP port (optional for webhooks)
EXPOSE 8080

# Start simple built-in PHP server
CMD php -S 0.0.0.0:8080 index.php
