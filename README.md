<h1>Тестовое задание</h1>

## запуск

    docker-compose up -d

сайт запустится на localhost:8098

во избежание всех ошибок лучше сделать:

    sudo chmod -R 777 storage

    docker exec -i -t fpm bash
    chown -R 33:33 storage

## миграции

    docker-compose exec fpm php artisan migrate

перед этим на всякий случай

    php artisan config:cache
