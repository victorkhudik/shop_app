# E-Commerce Game Keys Store

Мультистраничный интернет-магазин цифровых товаров и игровых ключей, реализованный на базе **Laravel** (Backend API) и **React + Vite** (Single Page Application / Frontend).

---

## 🛠 Стек технологий

* **Backend:** PHP 8.x, Laravel (Модульная архитектура: `Catalog`, `Sales`), Eloquent ORM, MySQL.
* **Frontend:** React 18, React Router v6, Vite.
* **Инфраструктура:** Docker, Docker Compose(`app`, `db`, `reverb`, `scheduler`), Apache.
* **Realtime/Websockets:** Laravel Reverb.
---

Высокопроизводительный каталог товаров для e-commerce платформы с моментальным поиском, URL-синхронизацией и масштабируемой структурой базы данных.

1. **Мультистраничный клиент (React Router):**
   * `/` — Главная страница с витриной, слайдерами и разделами товаров.
   * `/orders/:uuid` — Динамическая страница заказа с отслеживанием статуса и выдачей цифрового ключа.
2. **Защита от Race Conditions:**
   * Использование транзакций БД (`DB::transaction`) и блокировки строк (`lockForUpdate()`) при покупке товара, чтобы исключить выдачу одного и того же ключа двум покупателям.

---

## 🚀 Быстрый запуск

### Предварительные требования
* Docker & Docker Compose
* Node.js & npm (при локальной разработке без Docker)

---


### 1. Клонирование и настройка окружения
```bash

git clone <repository-url>
cd shop_app

```

### 2. Запуск через Docker Compose
Поднимите контейнеры приложения:
```bash

docker compose up -d --build

```
### 3. Настройка Backend (Laravel)
Выполните миграции и сиды внутри контейнера приложения:
```bash

# Установка зависимостей PHP
docker exec -it test_shop_app composer install

# Генерация ключа приложения
docker exec -it test_shop_app php artisan key:generate

# Выполнение миграций и наполнение тестовыми данными
docker exec -it test_shop_app php artisan migrate --seed

```

### 4. Настройка Frontend (React)
   Установите npm-пакеты для фронтенд-сервиса:
```bash
# Установка JS зависимостей
docker exec -it test_shop_frontend npm install
```

### Дополнительные опции
```bash
# Обновление и создание товара 
docker exec -it test_shop_app php artisan catalog:upsert-product
                            {--id= : ID товара (для прямого обновления)}
                            {--sku= : Артикул/SKU товара}
                            {--name= : Название товара}
                            {--slug= : URL товара}
                            {--price= : Стоимость}
                            {--special_price= : Стоимость}
                            {--quantity= : Количество на складе}
                            {--sales= : Количество проданых товаров}
                            {--type_name= : Название типа товара}
                            
#  Отменена просроченных заказов
docker exec -it test_shop_app php artisan sales:cancel-expired-orders
```

Приложение будет доступно по адресу: http://localhost:5173 (или настроенному домену, например http://app.test-shop.localhost:5173).
