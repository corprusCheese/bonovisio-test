<h1>Тестовое задание</h1>

## запуск

    docker-compose up -d

сайт запустится на localhost:8098

во избежание всех ошибок лучше сделать:

    sudo chmod -R 777 storage

    docker exec -i -t fpm bash
    chown -R 33:33 storage

также я запушил свой .env файл

## миграции

    docker-compose exec fpm php artisan migrate

перед этим на всякий случай

    php artisan config:cache

## тесты

    docker-compose exec fpm php artisan test

## swagger

документация доступна по адресу localhost:8098/api/documentation

## описание того, что я сделал

1. сделал spa на vue.js, можно создать письмо и посмотреть интерактивно как работает пагинация и сортировки
2. сделал три роута 
- 1 -  на создание письма
- 2 - на получение конкретного письма (если ввести дополнительно в гет-запросе fields=description, то выведет только имя, емейл и текст, если fields=images - пропарсит текст через регулярку и получит массив ссылок на изображения)
- 3 - на получение писем с учетом пагинации и сортировки по полю создания, сделал через simplePaginate, выводит только поля имя и емейл, как и написано в задании


