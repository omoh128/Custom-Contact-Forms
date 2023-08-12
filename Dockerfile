# Use the official WordPress image as the base
FROM wordpress:latest

# Set up environment variables for WordPress and MySQL
ENV WORDPRESS_DB_HOST=mysql
ENV WORDPRESS_DB_NAME=wordpress
ENV WORDPRESS_DB_USER=root
ENV WORDPRESS_DB_PASSWORD=root
ENV WORDPRESS_TABLE_PREFIX=wp_

# Copy the plugin files to the WordPress plugins directory
COPY custom-contact-forms /var/www/html/wp-content/plugins/custom-contact-forms

# Expose ports
EXPOSE 80

# Healthcheck to ensure container is healthy
HEALTHCHECK CMD curl --fail http://localhost:80 || exit 1
