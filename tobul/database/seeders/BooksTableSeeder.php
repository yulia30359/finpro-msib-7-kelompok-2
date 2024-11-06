<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BooksTableSeeder extends Seeder
{
    public function run()
    {
        $books = [
            [
                'idBook' => '9789790065994',
                'idCategory' => 25,
                'titleBook' => 'Biogas Solusi Energi',
                'priceBook' => 55000,
                'authorBook' => 'Sri Wahyuni',
                'publisherBook' => 'Kawah Media',
                'publishedBook' => Carbon::create(2017, 7, 12)->toDateString(),
                'descriptionBook' => 'X',
                'coverBook' => '',
                'stockBook' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idBook' => '9786024251284',
                'idCategory' => 25,
                'titleBook' => 'Nusantara dan ALKI (Alur Laut Kepulauan Indonesia)',
                'priceBook' => 100000,
                'authorBook' => 'Kresno Buntoro',
                'publisherBook' => 'RajaGrafindo Persada',
                'publishedBook' => Carbon::create(2017, 7, 22)->toDateString(),
                'descriptionBook' => 'X',
                'coverBook' => '',
                'stockBook' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idBook' => '9786236421611',
                'idCategory' => 25,
                'titleBook' => 'Teladan Dari Tiongkok',
                'priceBook' => 105000,
                'authorBook' => 'Dahlan Iskan',
                'publisherBook' => 'Pustaka Obor Indonesia',
                'publishedBook' => Carbon::create(2017, 7, 17)->toDateString(),
                'descriptionBook' => 'X',
                'coverBook' => '',
                'stockBook' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('books')->insert($books);
    }
}