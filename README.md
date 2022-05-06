# Helpers

## Usage

```shell
# Install dependencies
composer install

# Local dev
php -S localhost:9000 -f index.php

# Deploy to Heroku
heroku create
git push heroku main
```

## Endpoints
- `/`: [Parsedown](https://parsedown.org/) endpoint (POST)