<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://drive.google.com/uc?export=view&id=1Zeyd2diANNqCjbnqdg8S0qBOWJOM818U" width="400"></a></p>

# ιδέα

Idéa is an application with the purpose of expanding the coverage of education, through interactive and dynamic ideas, in which it is possible to apply improvements to the educational system through the implementation of international models that facilitate learning, from both a technical and socio-emotional point of view.

It should also be noted that it has been conceived with a focus on learning and training, not on certification. In other words, it is intended to present material dedicated to teaching and literacy. It consists of support that is not necessarily linked to an academic degree.

## How to run

Instructions on how to run our application for local development (in localhost). If you have PHP 8 installed you can skip to **'Install ιδέα'**.

### Dependencies installation
Specific to CentOS 8. You may find that package names as well as some configuration is different in your OS. All commands should be executed as root.

1. Disable and stop firewalld service:
```bash
systemctl disable --now firewalld
```

2. Install PHP 8 and some basic PHP 8 packages:
```bash
dnf install -y https://dl.fedoraproject.org/pub/epel/epel-release-latest-8.noarch.rpm
dnf install -y https://rpms.remirepo.net/enterprise/remi-release-8.rpm
dnf module list php # lists possible versions of PHP
dnf module enable php:remi-8.0 -y
dnf install -y php php-cli php-common php-fpm php-json php-zip php-mysql wget unzip
```

3. Install MariaDB:
```bash
dnf -y install mariadb-server
systemctl enable --now mariadb.service # start and enable mariadb service
```

4. Install composer:
```bash
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer
chmod +x /usr/local/bin/composer
```

### Install ιδέα

1. Create database and user in MariaDB. Enter MariaDB command line as root using `mysql` command. Then enter:
```sql
CREATE DATABASE idea;
GRANT ALL ON <database_name>.* TO <database_user>@localhost IDENTIFIED BY '<database_user_password>';
```

2. Clone the repository:
```shell
git clone https://github.com/jandrovins/idea.git
```

3. Install app dependencies with composer:
```bash
cd idea; composer install
```

4. Replace the following parameters in `.env` (we provide a template `.env-example`):
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=<port>
DB_DATABASE=<database_name>
DB_USERNAME=<database_user>
DB_PASSWORD="<database_user_password>"
```

5. Generate key to be stored in `.env:APP_KEY` parameter:
```bash
php artisan key:generate
```

6. Create tables in DB:
```bash
php artisan migrate
```

7. Create admin user and populate database (before this was done with a SQL file):
```bash
php artisan db:seed
```

8. Run and enjoy!
```bash
php artisan serve --port=8000 --host=0.0.0.0
```

# Authors

* Adrián Gutiérrez
* Simón Flórez
* Vincent Arcila
