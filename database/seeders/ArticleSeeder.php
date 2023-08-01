<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
        for($i=0;$i<4;$i++){
            DB::table('articles')->insert([
                'category_id'=>rand( 1,7),
                'title'=>$faker->title,
                'image'=>$faker->imageUrl(800,400,'cats',true),
                'content'=>$faker->text,
                'created_at'=>now(),
            ]);
        }
    }
}
