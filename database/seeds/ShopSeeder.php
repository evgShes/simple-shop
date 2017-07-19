<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\City;
use App\Products;
class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(with(new City())->getTable())->delete();
        City::create([
            'name'=>'Москва'
        ]);

        City::create([
            'name'=>'Апатиты'
        ]);

        City::create([
            'name'=>'Бакал'
        ]);

        City::create([
            'name'=>'Балаково'
        ]);


        DB::table(with(new Products())->getTable())->delete();
        Products::create([
            'title'=>'PHP Scripting v1',
            'imagePath'=>'http://www.drastudio.com/file/coda_books/php.png',
            'description'=>'Книга',
            'price'=>'100',
            'count'=>'50',
            'city_id'=>'1',
        ]);
        Products::create([
            'title'=>'PHP Scripting v2',
            'imagePath'=>'http://www.drastudio.com/file/coda_books/php.png',
            'description'=>'Книга',
            'price'=>'100',
            'count'=>'50',
            'city_id'=>'1',
        ]);
        Products::create([
            'title'=>'PHP Scripting v3',
            'imagePath'=>'http://www.drastudio.com/file/coda_books/php.png',
            'description'=>'Книга',
            'price'=>'100',
            'count'=>'50',
            'city_id'=>'1',
        ]);

        Products::create([
            'title'=>'PHP Scripting v4',
            'imagePath'=>'http://www.drastudio.com/file/coda_books/php.png',
            'description'=>'Книга',
            'price'=>'100',
            'count'=>'50',
            'city_id'=>'2',
        ]);
        Products::create([
            'title'=>'PHP Scripting v12',
            'imagePath'=>'http://www.drastudio.com/file/coda_books/php.png',
            'description'=>'Книга',
            'price'=>'100',
            'count'=>'50',
            'city_id'=>'2',
        ]);
        Products::create([
            'title'=>'PHP Scripting v112',
            'imagePath'=>'http://www.drastudio.com/file/coda_books/php.png',
            'description'=>'Книга',
            'price'=>'100',
            'count'=>'50',
            'city_id'=>'2',
        ]);


        Products::create([
            'title'=>'PHP Scripting v555',
            'imagePath'=>'http://www.drastudio.com/file/coda_books/php.png',
            'description'=>'Книга',
            'price'=>'100',
            'count'=>'50',
            'city_id'=>'3',
        ]);
        Products::create([
            'title'=>'PHP Scripting v5.55',
            'imagePath'=>'http://www.drastudio.com/file/coda_books/php.png',
            'description'=>'Книга',
            'price'=>'100',
            'count'=>'50',
            'city_id'=>'3',
        ]);
        Products::create([
            'title'=>'PHP Scripting v1.255',
            'imagePath'=>'http://www.drastudio.com/file/coda_books/php.png',
            'description'=>'Книга',
            'price'=>'100',
            'count'=>'50',
            'city_id'=>'3',
        ]);



        Products::create([
            'title'=>'PHP Scripting v212.2',
            'imagePath'=>'http://www.drastudio.com/file/coda_books/php.png',
            'description'=>'Книга',
            'price'=>'100',
            'count'=>'50',
            'city_id'=>'4',
        ]);
        Products::create([
            'title'=>'PHP Scripting v9.3645',
            'imagePath'=>'http://www.drastudio.com/file/coda_books/php.png',
            'description'=>'Книга',
            'price'=>'100',
            'count'=>'50',
            'city_id'=>'4',
        ]);
        Products::create([
            'title'=>'PHP Scripting v6.35',
            'imagePath'=>'http://www.drastudio.com/file/coda_books/php.png',
            'description'=>'Книга',
            'price'=>'100',
            'count'=>'50',
            'city_id'=>'4',
        ]);

    }
}
