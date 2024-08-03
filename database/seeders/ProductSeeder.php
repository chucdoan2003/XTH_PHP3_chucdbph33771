<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\productColor;
use App\Models\productGalleries;
use App\Models\productMaterial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PhpParser\Node\Stmt\Foreach_;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(['Blue', 'Red', 'White',] as $item){
            productColor::query()->create([
                'name'=>$item
            ]);
        }
        foreach(['Plastic', 'Wood'] as $item){
            productMaterial::query()->create([
                'name'=>$item
            ]);
        }

        for($i = 0; $i<10; $i++){
            Category::query()->create([
                'name'=>fake()->name(),
                'image'=>''
            ]);
        }


        for($i = 0; $i<10; $i++){
            Product::query()->create([
                'name'=>fake()->name(),
                'price'=>fake()->numberBetween(0,1000),
                'price_sale'=>fake()->numberBetween(0, 1000),
                'thumb_nail'=>"",
                'description'=>fake()->text(50),
                'category_id'=>1,
                'sku'=>"SP0312"

            ]);
        }

         for($i=0; $i<10;$i++){
            productGalleries::query()->create([
                    'product_id'=>$i+1,
                    "image"=>'https://tse2.mm.bing.net/th?id=OIP.2D8m99dlzS3ihTZwLbTp5wHaJQ&pid=Api&P=0&h=220'
            ]);
        }
    }
}
