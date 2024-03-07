<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Category::factory(10)->create();
        $datas = [
            ['name' => 'Festival', 'description' => 'a celebratory event that is typically marked by a series of special activities, performances, and rituals.'],
            ['name' => 'Play', 'description' => 'Theatrical events, commonly known as plays or performances, unfold captivating stories on stage through the art of acting.'],
            ['name' => 'Live Music Festivals', 'description' => 'Music events create immersive experiences for music enthusiasts, featuring live performances from diverse genres.'],
            ['name' => 'Film Festivals', 'description' => 'Film events celebrate the art of cinema, featuring a curated selection of movies from diverse genres and cultures.'],
            ['name' => 'Art Exhibitions', 'description' => 'Art events bring together artists and art lovers to appreciate and explore various forms of visual expression.'],
            ['name' => 'Music Concerts', 'description' => 'Immerse yourself in the rhythmic tapestry of live music as dynamic concerts unfold, spanning genres from rock anthems to soulful R&B, offering an electrifying experience that resonates with the heartbeat of diverse musical expressions.'],
            // ['name' => '', 'description' => ''],
        ];
        foreach ($datas as $data) {
            Category::create($data);
        }
    }
}
