<?php

namespace Modules\Catalog\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;

class CategorySeeder extends Seeder
{
    const TABLE_NAME = 'categories';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Игры и игровые сервисы',
                'sub_categories' => [
                    [
                        'name' => 'Steam',
                        'sub_categories' => [
                            ['name' => 'Игры и DLC'],
                            ['name' => 'Пополнение баланса'],
                            ['name' => 'Подарочные карты'],
                            ['name' => 'Коллекционные карточки'],
                            ['name' => 'Смена региона'],
                        ],
                    ],
                    [
                        'name' => 'PlayStation',
                        'sub_categories' => [
                            ['name' => 'Игры и DLC'],
                            ['name' => 'Пополнение баланса'],
                            ['name' => 'Новые аккаунты'],
                            ['name' => 'PS Plus'],
                            ['name' => 'EA Play'],
                        ],
                    ],
                    [
                        'name' => 'Xbox',
                        'sub_categories' => [
                            ['name' => 'Игры и DLC'],
                            ['name' => 'Пополнение баланса'],
                            ['name' => 'Новые аккаунты'],
                            ['name' => 'Xbox Game Pass'],
                            ['name' => 'Услуги'],
                        ],
                    ],
                    [
                        'name' => 'Nintendo',
                        'sub_categories' => [
                            ['name' => 'Игры и DLC'],
                            ['name' => 'Подарочные карты'],
                            ['name' => 'Новые аккаунты'],
                            ['name' => 'NS Online'],
                        ],
                    ],
                    [
                        'name' => 'Battle.net',
                        'sub_categories' => [
                            ['name' => 'World of Warcraft'],
                            ['name' => 'Подарочные карты'],
                            ['name' => 'Прямое пополнение'],
                            ['name' => 'Новые аккаунты'],
                            ['name' => 'Смена региона'],
                        ],
                    ],
                    [
                        'name' => 'Подборки',
                        'sub_categories' => [
                            ['name' => 'Скидки 90%'],
                            ['name' => 'Популярные издатели'],
                            ['name' => 'Лучшие серии игр'],
                            ['name' => 'Steam Deck'],
                            ['name' => 'Bundle-наборы'],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Игровые ценности',
                'sub_categories' => [
                    ['name' => 'VALORANT'],
                    ['name' => 'Roblox'],
                    ['name' => 'Fortnite'],
                    ['name' => 'Apex Legends'],
                    ['name' => 'Arena Breakout: Infinite'],
                    ['name' => 'PUBG mobile'],
                    ['name' => 'Call of Duty: Mobile'],
                    ['name' => 'Brawl Stars'],
                    ['name' => 'EA SPORTS FC 26 (FIFA)'],
                    ['name' => 'Counter-Strike 2 (CS:GO)'],
                    ['name' => 'Mobile Legends: Bang Bang'],
                    ['name' => 'World of Warcraft'],
                    ['name' => 'Helldivers 2'],
                    ['name' => 'League of Legends'],
                    ['name' => 'Clash Royale'],
                    ['name' => 'Genshin Impact'],
                    ['name' => 'Marvel Rivals'],
                    ['name' => 'Delta Force']
                ],
            ],
            [
                'name' => 'Мобильные игры',
                'sub_categories' => [
                    ['name' => 'PUBG Mobile'],
                    ['name' => 'Mobile Legends: Bang Bang'],
                    ['name' => 'Call of Duty: Mobile'],
                    ['name' => 'Clash Royale'],
                    ['name' => 'Brawl Stars'],
                    ['name' => 'Genshin Impact'],
                    ['name' => 'Hearthstone'],
                    ['name' => 'World of Tanks Blitz'],
                    ['name' => 'Clash of Clans'],
                    ['name' => 'FC Mobile'],
                    ['name' => 'Entropy 2099'],
                    ['name' => 'Standoff 2'],
                    ['name' => 'Mortal Kombat Mobile'],
                    ['name' => 'Zenless Zone Zero'],
                    ['name' => 'Tank Company'],
                    ['name' => 'Honkai: Star Rail'],
                    ['name' => 'League of Legends: Wild Rift'],
                    ['name' => 'Albion Online'], ['name' => 'Destiny: Rising'],
                    ['name' => 'World War Heroes'],
                    ['name' => 'Black Desert Mobile'],
                    ['name' => 'Sky: Children of the Light'],
                    ['name' => 'Whiteout Survival'],
                    ['name' => 'State of Survival'],
                    ['name' => 'Crystal of Atlan'],
                    ['name' => 'Candy Crush'],
                    ['name' => 'Top Eleven Football Manager'],
                    [
                        'name' => 'HoYoverse',
                        'sub_categories' => [
                            ['name' => 'Genshin Impact'],
                            ['name' => 'Honkai: Star Rail'],
                            ['name' => 'Zenless Zone Zero'],
                            ['name' => 'Honkai Impact 3rd'],
                        ],
                    ],
                    [
                        'name' => 'Supercell',
                        'sub_categories' => [
                            ['name' => 'Brawl Stars'],
                            ['name' => 'Clash Royale'],
                            ['name' => 'Clash of Clans'],
                            ['name' => 'Boom Beach'],
                            ['name' => 'Squad Busters'],
                        ],
                    ],
                    [
                        'name' => 'NetEase',
                        'sub_categories' => [
                            ['name' => 'Blood Strike'],
                            ['name' => 'Once Human'],
                            ['name' => 'Last Light'],
                            ['name' => 'Eggy Party'],
                            ['name' => 'Identity V'],
                        ],
                    ],
                ],

            ],

            [
                'name' => 'Сервисы и соцсети',
                'sub_categories' => [
                    ['name' => 'Claude AI'],
                    ['name' => 'ChatGPT'],
                    ['name' => 'Apple Gift Cards'],
                    ['name' => 'Spotify Premium'],
                    ['name' => 'Telegram Stars'],
                    ['name' => 'Telegram Premium'],
                    ['name' => 'eSIM'],
                    ['name' => 'Cursor'],
                    ['name' => 'Discord'],
                    ['name' => 'Perplexity AI'],
                    ['name' => 'GROK'],
                    ['name' => 'Gemini'],
                    ['name' => 'YouTube Premium'],
                    ['name' => 'Предоплаченные карты'],
                    ['name' => 'TikTok'],
                    ['name' => 'Google Play'],
                    ['name' => 'Freepik'],
                    ['name' => 'Zoom'],
                ], [
                'name' => 'Для жизни',
                'sub_categories' => [
                    ['name' => 'Видео и стриминг'],
                    ['name' => 'Музыка'],
                    ['name' => 'Соцсети и мессенджеры'],
                    ['name' => 'Сервисы для знакомств'],
                    ['name' => 'Облачные хранилища'],
                ], [
                    'name' => 'Для работы',
                    'sub_categories' => [
                        ['name' => 'Сток картинки, видео, аудио'],
                        ['name' => 'Программирование'],
                        ['name' => 'Обучение'],
                        ['name' => 'Переводчики'],
                        ['name' => 'Платформы для бизнеса'],
                    ],
                ],
                [
                    'name' => 'Нейросети',
                    'sub_categories' => [
                        ['name' => 'Общение и виртуальные персонажи'],
                        ['name' => 'Визуальный и видеоконтент'],
                        ['name' => 'AI для программистов'],
                        ['name' => 'Аудиоконтент'],
                        ['name' => 'Работа с текстом и контентом'],
                    ],
                ],
                [
                    'name' => 'Карты для любых оплат',
                    'sub_categories' => [
                        ['name' => 'Оплата Отелей'],
                        ['name' => 'Оплата зарубежных сервисов'],
                        ['name' => 'Произвольный номинал'],
                        ['name' => 'Фиксированный номинал'],
                        ['name' => 'Турецкие Банки'],
                    ],
                ],
                [
                    'name' => 'Специальное',
                    'sub_categories' => [
                        ['name' => 'Здоровье'],
                        ['name' => 'Накрутка'],
                        ['name' => 'eSIM'],
                        ['name' => 'Доступ к мобильным банкам'],
                    ],
                ],
            ],
            ],
            [
                'name' => 'Программы',
                'sub_categories' => [
                    ['name' => 'Adobe Creative Cloud'],
                    ['name' => 'Windows'],
                    ['name' => 'Microsoft Office'],
                    ['name' => 'CapCut'],
                    ['name' => 'JetBrains'],
                    ['name' => 'VoiceMod pro'],
                    ['name' => 'iMazing'],
                    ['name' => 'Kaspersky'],
                    ['name' => 'Eset'], [
                        'name' => 'Рабочее',
                        'sub_categories' => [
                            ['name' => 'Офисное ПО'],
                            ['name' => 'Операционные системы'],
                            ['name' => 'Фото и видео редакторы'],
                            ['name' => 'Музыка и Аудио'],
                        ],
                    ],
                    [
                        'name' => 'Безопасность',
                        'sub_categories' => [
                            ['name' => 'Приватные браузеры'],
                            ['name' => 'Антивирусы'],
                            ['name' => 'Fake GPS'],
                        ],
                    ],
                    [
                        'name' => 'Утилиты',
                        'sub_categories' => [
                            ['name' => 'Оптимизация'],
                            ['name' => 'Виртуалки'],
                            ['name' => 'Бэкапы'],
                            ['name' => 'Скринкаст'],
                            ['name' => 'Файлы'],
                        ],
                    ],
                    [
                        'name' => 'Для специалистов',
                        'sub_categories' => [
                            ['name' => 'САПР, СПДС'],
                            ['name' => 'Программирование'],
                            ['name' => 'Автоматизация (BPM)'],
                            ['name' => 'SEO'],
                            ['name' => 'Разблокировка устройств'],
                        ],
                    ],
                    [
                        'name' => 'Для игр и стрима',
                        'sub_categories' => [
                            ['name' => 'Гейминг'],
                            ['name' => 'Стриминг'],
                            ['name' => 'Уменьшение пинга'],
                            ['name' => 'Блоггинг'],
                        ],
                    ],
                ],
            ],
        ];

        Schema::disableForeignKeyConstraints();
        DB::table(self::TABLE_NAME)->truncate();
        Schema::enableForeignKeyConstraints();

        $this->createCategories($categories);
    }

    /**
     * @param array $categories
     * @param int|null $parentId
     * @return void
     */
    private function createCategories(array $categories, ?int $parentId = null): void
    {
        foreach ($categories as $index => $category) {
            $slugBase = $parentId ? $parentId . '-' . $category['name'] : $category['name'];

            $categoryId = DB::table(self::TABLE_NAME)->insertGetId([
                'parent_id' => $parentId,
                'name' => $category['name'],
                'slug' => Str::slug($slugBase),
                'position' => $index + 1,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Если у текущего элемента есть подкатегории, вызовем функцию рекурсивно
            if (!empty($category['sub_categories'])) {
                $this->createCategories($category['sub_categories'], $categoryId);
            }
        }
    }

}
