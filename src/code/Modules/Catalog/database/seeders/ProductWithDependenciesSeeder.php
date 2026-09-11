<?php

namespace Modules\Catalog\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Modules\Catalog\Models\ProductType;
use Modules\Catalog\Models\Category;

class ProductWithDependenciesSeeder extends Seeder
{
    const TABLE_NAME = 'products';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sampleProducts = [
            'Донат' => [
                [
                    'name' => 'Roblox Gift Card 50 - 20000 Robux Все регионы',
                    'price' => 118.00,
                    'special_price' => null,
                    'sales' => 1000,
                ],
                [
                    'name' => 'Алмазы | Mobile Legends | 24/7 | ПО ID | СНГ | АВТО',
                    'price' => 59.00,
                    'special_price' => null,
                    'sales' => 6197,
                ],
                [
                    'name' => 'Королевская академия 54-й Сезон | BRAWL PASS',
                    'price' => 1299.00,
                    'special_price' => 1199.00,
                    'sales' => 1000,
                ],
                [
                    'name' => '24/7 | АВТО PUBG Mobile | 60 - 32400 UC | (По ID)',
                    'price' => 85.00,
                    'special_price' => null,
                    'sales' => 32898,
                ],
                [
                    'name' => 'АВТО 24/7 | V-Bucks | БЕЗ ВХОДА | EPIC/PSN/XBOX',
                    'price' => 49.00,
                    'special_price' => null,
                    'sales' => 9980,
                ],
                [
                    'name' => 'НОВЫЙ 54-Й СЕЗОН -> BRAWL PASS -> BRAWL',
                    'price' => 1099.00,
                    'special_price' => 799.00,
                    'sales' => 1000,
                ],
                [
                    'name' => 'Steam/Playstation 6000-37500 Золотые клетки /',
                    'price' => 1749.00,
                    'special_price' => null,
                    'sales' => 2247,
                ],
                [
                    'name' => '[СУПЕРКРЕДИТЫ] + РЕСУРСЫ и БОНУСЫ',
                    'price' => 149.00,
                    'special_price' => null,
                    'sales' => 924,
                ],
                [
                    'name' => 'RU/EU/KZ/TR WORLD OF WARCRAFT 60 ДНЕЙ /',
                    'price' => 2899.00,
                    'special_price' => 2699.00,
                    'sales' => 10152,
                ],
                [
                    'name' => 'Сезон K.A.O.C - PASS ROYALE - Clash Royale',
                    'price' => 1299.00,
                    'special_price' => 1129.00,
                    'sales' => 13456,
                ],
                [
                    'name' => 'Пополнение по никнейму(16+) Без Входа',
                    'price' => 1.20,
                    'special_price' => null,
                    'sales' => 2030,
                ],
                [
                    'name' => '6480 + 1600 КРИСТАЛЛОВ GENSHIN IMPACT ПО ID',
                    'price' => 9604.00,
                    'special_price' => 9299.00,
                    'sales' => 177,
                ]
            ],
            'Подписки' => [
                [
                    'name' => 'PS PLUS ЛЮКС•ЭКСТРА•ОСНОВНАЯ•EA PLAY 1-12 УКРАИНА',
                    'price' => 699.00,
                    'special_price' => null,
                    'sales' => 14978,
                ],
                [
                    'name' => 'ЧатГПТ 5.5 PLUS НА 1 МЕСЯЦ ChatGPT 5.5 CODEX НОВАЯ ПОЧТА ГОТОВАЯ ПОДПИСКА',
                    'price' => 2180.00,
                    'special_price' => null,
                    'category' => 'Аккаунт',
                    'sales' => 373,
                ],
                [
                    'name' => '[БЕЗ/С ВХОДОМ] Grok AI [xAI] | SuperGrok/Lite/Heavy | Подписка | 1-3 МЕСЯЦА',
                    'price' => 1349.00,
                    'special_price' => null,
                    'sales' => 100,
                ],
                [
                    'name' => 'NETFLIX PREMIUM 4K на 1 МЕСЯЦ В РФ РАБОТАЕТ | Готовая подписка',
                    'price' => 429.00,
                    'special_price' => null,
                    'sales' => 31717,
                ],
                [
                    'name' => '1 UAH = 2.25₽ Пополнение, подписки, игры PSN | Украина',
                    'price' => 2.25,
                    'special_price' => null,
                    'sales' => 757,
                ],
                [
                    'name' => '24/7 ChatGPT PRO 6 x5 x20 | АВТО 1 месяц | ОФИЦИАЛЬНО | ГПТ 5.6 + кодекс | ЧАТ ГПТ ПРО ЧАТГПТ ПРО',
                    'price' => 10999.00,
                    'special_price' => null,
                    'sales' => 100,
                ],
                [
                    'name' => 'Обновление до Figma Pro Edu | 2 года премиум-подписки',
                    'price' => 1200.00,
                    'special_price' => null,
                    'sales' => 100,
                ],
                [
                    'name' => 'Persona Pro ПОДПИСКА ios iPhone iPad AppStore ios',
                    'price' => 220.00,
                    'special_price' => null,
                    'sales' => 100,
                ],
                [
                    'name' => '1 UAH = 2.4₽ Покупка Игр-Пополнение PSN Украина•Подписка PS Plus•EA',
                    'price' => 2.40,
                    'special_price' => null,
                    'sales' => 6352,
                ],
                [
                    'name' => 'Persona Pro ПОДПИСКА App Store iPad iPhone iOS',
                    'price' => 220.00,
                    'special_price' => null,
                    'sales' => 41,
                ],
                [
                    'name' => 'АВТО 24/7 | ЧатГПТ PRO X5-X20 | 1 месяц | подписка | 1 минута',
                    'price' => 8700.00,
                    'special_price' => null,
                    'sales' => 100,
                ],
                [
                    'name' => '[АВТОВЫДАЧА 24/7] ChatGPT 5.6 GO | НА ЛИЧНЫЙ | 1 МЕСЯЦ',
                    'price' => 689.00,
                    'special_price' => null,
                    'sales' => 2433,
                ]
            ],
            'Предметы' => [
                [
                    'name' => 'Roblox Gift Card 50 - 20000 Robux Все регионы',
                    'price' => 118.00,
                    'special_price' => null,
                    'sales' => 1000,
                ],
                [
                    'name' => 'Алмазы | Mobile Legends | 24/7 | ПО ID | СНГ | АВТО',
                    'price' => 59.00,
                    'special_price' => null,
                    'sales' => 6197,
                ],
                [
                    'name' => 'Королевская академия 54-й Сезон | BRAWL PASS',
                    'price' => 1299.00,
                    'special_price' => 1199.00,
                    'sales' => 1000,
                ],
                [
                    'name' => '24/7 | АВТО PUBG Mobile | 60 - 32400 UC | (По ID)',
                    'price' => 85.00,
                    'special_price' => null,
                    'sales' => 32898,
                ],
                [
                    'name' => 'АВТО 24/7 | V-Bucks | БЕЗ ВХОДА | EPIC/PSN/XBOX',
                    'price' => 49.00,
                    'special_price' => null,
                    'sales' => 9980,
                ],
                [
                    'name' => 'НОВЫЙ 54-Й СЕЗОН -> BRAWL PASS -> BRAWL',
                    'price' => 1099.00,
                    'special_price' => 799.00,
                    'sales' => 1000,
                ],
                [
                    'name' => 'Steam/Playstation 6000-37500 Золотые клетки',
                    'price' => 1749.00,
                    'special_price' => null,
                    'sales' => 2247,
                ],
                [
                    'name' => '[СУПЕРКРЕДИТЫ] + РЕСУРСЫ и БОНУСЫ',
                    'price' => 149.00,
                    'special_price' => null,
                    'sales' => 924,
                ],
                [
                    'name' => 'RU/EU/KZ/TR WORLD OF WARCRAFT 60 ДНЕЙ',
                    'price' => 2899.00,
                    'special_price' => 2699.00,
                    'sales' => 10152,
                ],
                [
                    'name' => 'Сезон K.A.O.C - PASS ROYALE - Clash Royale',
                    'price' => 1299.00,
                    'special_price' => 1129.00,
                    'sales' => 13456,
                ],
                [
                    'name' => 'Пополнение по никнейму(16+) Без Входа',
                    'price' => 1.20,
                    'special_price' => null,
                    'sales' => 2030,
                ],
                [
                    'name' => '6480 + 1600 КРИСТАЛЛОВ GENSHIN IMPACT ПО ID',
                    'price' => 9604.00,
                    'special_price' => 9299.00,
                    'sales' => 177,
                ]
            ],
            'Аккаунты' => [
                [
                    'name' => 'КАЗАХСКИЙ АККАУНТ СТИМ/STEAM(Регион Казахстан)',
                    'price' => 99.00,
                    'special_price' => null,
                    'sales' => 100,
                ],
                [
                    'name' => 'Figma Pro EDU | 2 года | На ваш аккаунт или готовый аккаунт',
                    'price' => 1200.00,
                    'special_price' => null,
                    'sales' => 100,
                ],
                [
                    'name' => 'Minecraft ios iPhone iPad AppStore + НА ВАШ Apple ID iOS iPhone iPad',
                    'price' => 149.00,
                    'special_price' => 1899.00,
                    'sales' => 321,
                ],
                [
                    'name' => 'Новый STEAM аккаунт: Казахстан [Валюта: KZT] ПОЛНЫЙ ДОСТУП + ПОЧТА',
                    'price' => 99.00,
                    'special_price' => null,
                    'sales' => 100,
                ],
                [
                    'name' => 'Автоматическая регистрация аккаунта Rockstar/Рокстар создание аккаунт рокстар',
                    'price' => 99.00,
                    'special_price' => null,
                    'sales' => 1000,
                ],
                [
                    'name' => 'Турецкий аккаунт (ГОТОВЫЙ АККАУНТ/РЕГИСТРАЦИЯ) PSN',
                    'price' => 129.00,
                    'special_price' => null,
                    'sales' => 12709,
                ],
                [
                    'name' => 'Minecraft Java + Bedrock + ПОДАРОК | ВСЕ СТРАНЫ',
                    'price' => 1299.00,
                    'special_price' => 1899.00,
                    'sales' => 1000,
                ],
                [
                    'name' => 'Украинский аккаунт (РЕГИСТРАЦИЯ/НОВЫЙ АККАУНТ) PSN',
                    'price' => 129.00,
                    'special_price' => null,
                    'sales' => 5809,
                ],
                [
                    'name' => 'MINECRAFT Java & Bedrock Edition',
                    'price' => 1299.00,
                    'special_price' => 1899.00,
                    'sales' => 1000,
                ],
                [
                    'name' => 'Аккаунт Google США | Аккаунт Google 5 лет | Проверенный',
                    'price' => 590.00,
                    'special_price' => null,
                    'sales' => 1000,
                ],
                [
                    'name' => 'Новый Аккаунт Steam (Казахстан) + Игра в подарок',
                    'price' => 99.00,
                    'special_price' => null,
                    'sales' => 100,
                ],
                [
                    'name' => 'GeoGuessr PRO/UNLIMITED | 3/6/12 МЕСЯЦЕВ | Автовыдача',
                    'price' => 219.00,
                    'special_price' => null,
                    'sales' => 100,
                ]
            ],
            'Ключи' => [
                [
                    'name' => 'PRAGMATA - Выбор издания - Steam ключ РФ+СНГ',
                    'price' => 3499.00,
                    'special_price' => null,
                    'sales' => 1,
                ],
                [
                    'name' => 'Scrap Garden (Steam Ключ) РФ-СНГ-МИР + ПОДАРОК',
                    'price' => 43.00,
                    'special_price' => null,
                    'sales' => 15,
                ],
                [
                    'name' => 'Scrap Garden | Steam Ключ | GLOBAL + РФ/СНГ | АВТОВЫДАЧА 24/7',
                    'price' => 62.00,
                    'special_price' => null,
                    'sales' => 0,
                ],
                [
                    'name' => 'Still Life / Steam Ключ / РФ+СНГ | АВТОВЫДАЧА 24/7',
                    'price' => 137.00,
                    'special_price' => null,
                    'sales' => 3,
                ],
                [
                    'name' => 'Still Life (Steam Ключ) РФ-СНГ + ПОДАРОК',
                    'price' => 151.00,
                    'special_price' => null,
                    'sales' => 1,
                ],
                [
                    'name' => 'Still Life КЛЮЧ STEAM РФ+СНГ',
                    'price' => 136.00,
                    'special_price' => null,
                    'sales' => 0,
                ],
                [
                    'name' => 'Still Life Collection Steam КЛЮЧ GLOBAL',
                    'price' => 626.00,
                    'special_price' => null,
                    'sales' => 0,
                ],
                [
                    'name' => 'SOULFRAME | КЛЮЧ АКТИВАЦИИ (БЕТА-ТЕСТ) + ПОДАРОК',
                    'price' => 200.00,
                    'special_price' => null,
                    'sales' => 75,
                ],
                [
                    'name' => 'Sexy Mystic Survivors | АВТОДОСТАВКА [Россия Steam]',
                    'price' => 212.00,
                    'special_price' => null,
                    'sales' => 9,
                ],
                [
                    'name' => 'Sexy Mystic Survivors · STEAM GIFT · АВТОДОСТАВКА',
                    'price' => 230.00,
                    'special_price' => null,
                    'sales' => 0,
                ],
                [
                    'name' => 'Sexy Mystic Survivors · STEAM GIFT · АВТОДОСТАВКА',
                    'price' => 229.00,
                    'special_price' => null,
                    'sales' => 0,
                ],
                [
                    'name' => 'Sexy Mystic Survivors Steam GIFT АВТОДОСТАВКА РОССИЯ + СНГ',
                    'price' => 223.00,
                    'special_price' => null,
                    'sales' => 0,
                ]
            ],
            'Игровая валюта' => [
                [
                    'name' => 'Steam/Playstation 6000-37500 Золотые клетки / Auric cells',
                    'price' => 1749.00,
                    'special_price' => null,
                    'sales' => 2274,
                ],
                [
                    'name' => 'Steam + Другие платформы | АВТОВЫДАЧА | Золотые клетки | DBD',
                    'price' => 390.00,
                    'special_price' => null,
                    'sales' => 11864,
                ],
                [
                    'name' => 'STEAM |Dead by Daylight| Золотые клетки//PC/PSN/Xbox',
                    'price' => 599.00,
                    'special_price' => null,
                    'sales' => 1229,
                ],
                [
                    'name' => '2250-50000 Золотые клетки | Dead by Daylight Steam | Ps | Xbox',
                    'price' => 800.00,
                    'special_price' => null,
                    'sales' => 38,
                ],
                [
                    'name' => 'Steam + Другие платформы | АВТОВЫДАЧА | Золотые клетки | DBD',
                    'price' => 390.00,
                    'special_price' => null,
                    'sales' => 236,
                ],
                [
                    'name' => '1 Сферы = 2.5₽ Path of Exile 1 Curse of the Allflame БОЖЕСТВЕННАЯ',
                    'price' => 2.50,
                    'special_price' => null,
                    'sales' => 142,
                ],
                [
                    'name' => '1 Сферы = 2.5₽ PATH OF EXILE Curse of the Allflame БОЖЕСТВЕННАЯ',
                    'price' => 2.50,
                    'special_price' => null,
                    'sales' => 64,
                ],
                [
                    'name' => '1 Сферы = 2.5₽ Path of Exile 1 Curse of the Allflame Божественные Сферы',
                    'price' => 2.50,
                    'special_price' => null,
                    'sales' => 9,
                ],
                [
                    'name' => 'Badlanders | Игровая валюта | Global | Автодоставка',
                    'price' => 50.00,
                    'special_price' => null,
                    'sales' => 0,
                ],
                [
                    'name' => 'NBA 2K24 (ИГРОВАЯ ВАЛЮТА VC) XBOX',
                    'price' => 973.00,
                    'special_price' => null,
                    'sales' => 1,
                ],
                [
                    'name' => 'Teen Patti Gold | Игровая валюта | Global | Автодоставка',
                    'price' => 50.00,
                    'special_price' => null,
                    'sales' => 0,
                ],
                [
                    'name' => 'Minecoins Pack — Steam: игровая валюта / поинты (Global)',
                    'price' => 777.00,
                    'special_price' => 1899.00,
                    'sales' => 0,
                ]
            ],
            'Другое' => [
                [
                    'name' => 'Steam США ТУРЦИЯ и другие код пополнения кошелька USD',
                    'price' => 24.00,
                    'special_price' => null,
                    'sales' => 217,
                ],
                [
                    'name' => '[GLM 5 и другие] Z AI API ключ с балансом 10-1000',
                    'price' => 30.00,
                    'special_price' => null,
                    'sales' => 6,
                ],
                [
                    'name' => 'Persona Beauty Camera VIP/Lifetime 1-12M | , ПОЛНАЯ',
                    'price' => 1899.00,
                    'special_price' => null,
                    'sales' => 5,
                ],
                [
                    'name' => 'Syntx AI Basic/Pro/VIP/Elite/Ultra Elite 1-12 M | FAST, FULL WARRANTY',
                    'price' => 1499.00,
                    'special_price' => null,
                    'sales' => 0,
                ],
                [
                    'name' => 'SPLIT FICTION + ВЕРСИЯ ДЛЯ ДРУГА | ЛИЦЕНЗИОННЫЙ АККАУНТ',
                    'price' => 149.00,
                    'special_price' => null,
                    'sales' => 100,
                ],
                [
                    'name' => 'Bling Deal БЛИНГИ | BRAWL STARS и ДРУГИЕ АКЦИИ',
                    'price' => 139.00,
                    'special_price' => null,
                    'sales' => 235,
                ],
                [
                    'name' => 'Canva pro сроком на 1 год',
                    'price' => 172.00,
                    'special_price' => null,
                    'sales' => 24,
                ],
                [
                    'name' => 'WoW: Midnight [Подарком] | ВСЕ РЕГИОНЫ | ВСЕ ВЕРСИИ | Европа/КЗ/Турция и другие регионы',
                    'price' => 2499.00,
                    'special_price' => 4099.00,
                    'sales' => 495,
                ],
                [
                    'name' => 'MISTRAL AI Pro | Team | Подписки | 1-12м',
                    'price' => 1599.00,
                    'special_price' => null,
                    'sales' => 10,
                ],
                [
                    'name' => 'Виртуальный номер для регистрации в Telegram / любых сервисах',
                    'price' => 600.00,
                    'special_price' => null,
                    'sales' => 138,
                ],
                [
                    'name' => 'Товар Подписка Fishaudio | Fish Audio Plus на 1 месяц на ваш аккаунт',
                    'price' => 590.00,
                    'special_price' => null,
                    'sales' => 26,
                ],
                [
                    'name' => 'Crunchyroll Fan/Mega Fan 1-12M Подписка | Обновление | + Гарантия',
                    'price' => 1050.00,
                    'special_price' => null,
                    'sales' => 21,
                ]
            ]
        ];

        $generatedProducts = $this->generateGamingProducts(1000);
        foreach ($generatedProducts as $type => $items) {
            if (!isset($sampleProducts[$type])) {
                $sampleProducts[$type] = [];
            }
            $sampleProducts[$type] = array_merge($sampleProducts[$type], $items);
        }

        Schema::disableForeignKeyConstraints();
        DB::table(self::TABLE_NAME)->truncate();
        DB::table('category_product')->truncate();
        Schema::enableForeignKeyConstraints();

        $categoryIds = Category::pluck('id')->toArray();
        $productTypeIds = ProductType::pluck('id')->toArray();

        if (empty($categoryIds) || empty($productTypeIds)) {
            $this->command->warn('Сначала запустите сидеры для categories и product_types!');
            return;
        }

        $imageIndex = 1;

        foreach ($sampleProducts as $productTypeName => $products) {
            $productType = ProductType::firstOrCreate(['name' => $productTypeName]);
            if ($productType) {
                foreach ($products as $product) {
                    $productId = DB::table(self::TABLE_NAME)->insertGetId([
                        'sku' => 'SKU-' . strtoupper(Str::random(8)),
                        'type_id' => $productType->id,
                        'name' => $product['name'],
                        'slug' => Str::slug($product['name']) . '-' . ($imageIndex + 1),
                        'quantity' =>  rand(0, 100),
                        'price' => $product['price'],
                        'special_price' => $product['special_price'],
                        'image' => 'https://loremflickr.com/227/151?lock=' . $imageIndex,
                        'is_active' => true,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);

                    $randomCategories = (array)array_rand(array_flip($categoryIds), rand(1, 3));

                    foreach ($randomCategories as $catId) {
                        DB::table('category_product')->insert([
                            'product_id' => $productId,
                            'category_id' => $catId
                        ]);
                    }
                    $imageIndex++;
                }

                $imageIndex++;
            }
        }
    }

    /**
     * Генерация игровых товаров
     */
    private function generateGamingProducts(int $count): array
    {
        $games = [
            'CS2', 'Dota 2', 'GTA V', 'Rust', 'Elden Ring', 'Cyberpunk 2077', 'Valorant',
            'Apex Legends', 'Fortnite', 'Minecraft', 'Genshin Impact', 'League of Legends',
            'Standoff 2', 'Tarkov', 'World of Tanks', 'Diablo IV', 'Helldivers 2', 'FC 25'
        ];

        $regions = ['РФ/СНГ', 'Турция', 'Казахстан', 'GLOBAL', 'Европа', 'США', 'Украина'];
        $platforms = ['Steam', 'PlayStation', 'Xbox', 'Epic Games', 'App Store', 'Google Play'];
        $prefixes = ['[АВТО 24/7]', '⚡ Мгновенная доставка', '⭐ TOP SALE', '🔥 АКЦИЯ', '[Скидка]', '✅ ГАРАНТИЯ'];

        $typesData = [
            'Ключи' => ['Steam Ключ', 'Ключ Активации', 'Digital Key', 'Лицензионный Ключ', 'CD-Key'],
            'Донат' => ['Боевой Пропуск', 'Валюта', 'Кристаллы', 'Донат По Нику', 'Пополнение Счета'],
            'Подписки' => ['Подписка 1 месяц', 'Подписка 3 месяца', 'Premium 1 Год', 'Pass VIP', 'Ultimate Access'],
            'Аккаунты' => ['Личный Аккаунт', 'Готовый Аккаунт', 'Аккаунт с Играми', 'Новый Аккаунт + Почта', 'VIP Аккаунт'],
            'Игровая валюта' => ['Золото', 'Монеты', 'Кредиты', 'G-Coins', 'VP Points', 'UC', 'Рубины'],
            'Предметы' => ['Скин', 'Инвентарь', 'Редкий Предмет', 'Набор Оружия', 'Секретный Пак'],
            'Другое' => ['Буст Уровня', 'Прокачка', 'Обучение/Коачинг', 'Услуги', 'Подарочная Карта']
        ];

        $result = [];

        for ($i = 0; $i < $count; $i++) {
            $typeName = array_rand($typesData);
            $itemSubtype = $typesData[$typeName][array_rand($typesData[$typeName])];
            $game = $games[array_rand($games)];
            $region = $regions[array_rand($regions)];
            $platform = $platforms[array_rand($platforms)];
            $prefix = (rand(0, 1) === 1) ? $prefixes[array_rand($prefixes)] . ' ' : '';

            $name = trim("{$prefix}{$game} — {$itemSubtype} | {$platform} | {$region}");

            $basePrice = rand(10, 500) * 10 - 1;
            $hasSpecial = rand(1, 5) === 1;
            $specialPrice = $hasSpecial ? round($basePrice * 0.8) : null;

            $result[$typeName][] = [
                'name' => $name,
                'price' => (float)$basePrice,
                'special_price' => $specialPrice ? (float)$specialPrice : null,
                'sales' => rand(0, 5000),
            ];
        }

        return $result;
    }
}
