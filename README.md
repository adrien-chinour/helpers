# Helpers

https://fathomless-reaches-93732.herokuapp.com/

## Usage

```shell
# Install dependencies
composer install

# Local dev
php -S localhost:9000 -f web/index.php -t web/

# Deploy to Heroku
heroku create
git push heroku main
```

## Endpoints

- `/parsedown`: [Parsedown](https://parsedown.org/) endpoint (POST)
