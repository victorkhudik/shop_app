<?php

namespace Modules\Catalog\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Modules\Catalog\Models\Product;
use Modules\Catalog\Models\ProductType;
use Modules\Catalog\Events\ProductUpdated;

class UpsertProductCommand extends Command
{
    const DEFAULT_TYPE_NAME = 'Другое';
    /**
     * Имя и сигнатура консольной команды.
     * Пример использования:
     * php artisan catalog:upsert-product --sku="PROD-1" --name="Подарочная карта" --price=5000 --quantity=10
     */
    protected $signature = 'catalog:upsert-product
                            {--id= : ID товара (для прямого обновления)}
                            {--sku= : Артикул/SKU товара}
                            {--name= : Название товара}
                            {--slug= : URL товара}
                            {--price= : Стоимость}
                            {--special_price= : Специальная цена}
                            {--quantity= : Количество на складе}
                            {--sales= : Количество проданых товаров}
                            {--type_name= : Название типа товара}';

    /**
     * Описание консольной команды.
     */
    protected $description = 'Создает новый товар или обновляет существующий в каталоге';

    /**
     * Выполнение команды.
     */
    public function handle(): int
    {
        $id = $this->option('id');
        $sku = $this->option('sku');
        $typeName = $this->option('type_name');

        $productOptions = [
            'name' => $this->option('name'),
            'slug' => $this->option('slug'),
            'price' => $this->option('price'),
            'special_price' => $this->option('special_price'),
            'quantity' => $this->option('quantity'),
            'sales' => $this->option('sales'),
            'type_id' => null
        ];

        if (!$id && !$sku) {
            $this->error('Необходимо указать --id или --sku товара!');
            return Command::FAILURE;
        }

        $product = null;

        if ($id) {
            $product = Product::find($id);
        } elseif ($sku) {
            $product = Product::where('sku', $sku)->first();
        }

        $isNew = false;

        if (!$product) {
            if (!$productOptions['name'] || $productOptions['price'] === null || $productOptions['quantity'] === null) {
                $this->error('Для создания нового товара необходимо передать: --name, --price и --quantity');
                return Command::FAILURE;
            }

            $product = new Product();
            if ($sku) {
                $product->sku = $sku;
            }
            $imageIndex = Product::count();
            $product->image = 'https://loremflickr.com/227/151?lock=' . $imageIndex;
            $isNew = true;

            if (!$typeName) {
                $typeName = self::DEFAULT_TYPE_NAME;
            }

            if (!$productOptions['slug']) {
                $productOptions['slug'] = Str::slug($product['name']) . '-' . ($imageIndex + 1);
            }
        }

        if ($typeName) {
            $productOptions['type_id'] = $this->getProductType($typeName)->id;
        }

        foreach ($productOptions as $name => $option) {
            if ($option) {
                $product->{$name} = $option;
            }
        }

        $product->save();

        event(new ProductUpdated($product->fresh()));

        $actionText = $isNew ? 'создан' : 'обновлен';
        $this->info("Товар '{$product->name}' (ID: {$product->id}) успешно {$actionText}!");

        return Command::SUCCESS;
    }

    private function getProductType(string $productTypeName): ProductType
    {
        return ProductType::firstOrCreate(['name' => $productTypeName]);
    }
}
