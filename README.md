Installation guide with Docker:

1. Download package from repo to local machine
2. Open project folder in command line
3. Copy env.example like .env and indicate database connection parameters same as in docker-compose.yml
4. Run "composer update"
5. Run "docker-compose up --build -d"
6. Run "docker-compose exec app php artisan key:generate"
7. Run "docker-compose exec app php artisan migrate:fresh --seed"

Request to get all products
    GET /api/products

Request to get filtered products:
    GET /api/products?properties[option_name][]=option_value&properties[option_name2][]=option_value2


