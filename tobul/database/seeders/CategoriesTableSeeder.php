<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            ['titleCategory' => 'Agama'],
            ['titleCategory' => 'Spiritualitas'],
            ['titleCategory' => 'Aliran & Gaya Bahasa'],
            ['titleCategory' => 'Arsitektur'],
            ['titleCategory' => 'Biografi & Autobiografi'],
            ['titleCategory' => 'Bisnis & Ekonomi'],
            ['titleCategory' => 'Desain'],
            ['titleCategory' => 'Fiksi'],
            ['titleCategory' => 'Filsafat'],
            ['titleCategory' => 'Fotografi'],
            ['titleCategory' => 'Hukum'],
            ['titleCategory' => 'Humor'],
            ['titleCategory' => 'Ilmu Politik'],
            ['titleCategory' => 'Ilmu Sosial'],
            ['titleCategory' => 'Keluarga & Hubungan'],
            ['titleCategory' => 'Fashion'],
            ['titleCategory' => 'Kesehatan & Kebugaran'],
            ['titleCategory' => 'Komik & Novel Grafis'],
            ['titleCategory' => 'Komputer'],
            ['titleCategory' => 'Matematika'],
            ['titleCategory' => 'Medis'],
            ['titleCategory' => 'Musik'],
            ['titleCategory' => 'Pendidikan'],
            ['titleCategory' => 'Sejarah'],
            ['titleCategory' => 'Teknologi & Teknik'],
        ]);
    }
}