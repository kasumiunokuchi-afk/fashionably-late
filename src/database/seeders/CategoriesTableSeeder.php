<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'content' => '商品のお届けについて'
        ];
        Category::create($param);
        $param = [
            'content' => '商品の交換について'
        ];
        Category::create($param);
        $param = [
            'content' => '商品トラブル'
        ];
        Category::create($param);
        $param = [
            'content' => 'ショップへのお問い合わせ'
        ];
        Category::create($param);
        $param = [
            'content' => 'その他'
        ];
        Category::create($param);
    }
}
