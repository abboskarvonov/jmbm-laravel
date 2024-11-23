<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::create([
            'name_uz' => 'Jurnal haqida',
            'name_ru' => 'О журнале',
            'name_en' => 'About the Journal',
            'slug' => '/',
        ]);
        Menu::create([
            'name_uz' => 'Tahririyat a\'zolari',
            'name_ru' => 'Члены редколлегии',
            'name_en' => 'Members of the editorial board',
            'slug' => '/members',
        ]);
        Menu::create([
            'name_uz' => 'Maqola talablari',
            'name_ru' => 'Требования к статье',
            'name_en' => 'Article requirements',
            'slug' => '/requirements',
        ]);
        Menu::create([
            'name_uz' => 'Tahririyat nizomi',
            'name_ru' => 'Редакционный регламент',
            'name_en' => 'Editorial regulations',
            'slug' => '/statue',
        ]);
        Menu::create([
            'name_uz' => 'Maqolalar',
            'name_ru' => 'Статьи',
            'name_en' => 'Articles',
            'slug' => '/articles',
        ]);
        Menu::create([
            'name_uz' => 'Arxiv',
            'name_ru' => 'Архив',
            'name_en' => 'Archive',
            'slug' => '/archive',
        ]);
    }
}
