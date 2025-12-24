FROM php:8.3-cli

# Install PostgreSQL extensions
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pgsql pdo_pgsql

# Set working directory
WORKDIR /app

# Copy project files
COPY . /app

# Expose Render port
EXPOSE 10000

# Start PHP server
CMD ["php", "-S", "0.0.0.0:10000", "-t", "/app"]
