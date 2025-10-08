### Как развернуть проект

в терминале последовательно ввести команды

> cp .env.example .env

> composer install

> npm i

> php artisan key:generate

> php artisan migrate

> php artisan db:seed

после чего 

> npm run build

> php artisan serve

Публичная часть сайта будет доступна по адресу http://localhost:8000

Форма входа в административный раздел будет по адресу http://localhost:8000/admin/login

Регистрации в административном разделе нет, для входа нужно использовать
> email: admin@admi.n
> password: password

