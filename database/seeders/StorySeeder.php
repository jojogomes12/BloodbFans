<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class StorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('story')->insert([
            'title'=>'Historia de amor',
            'content'=>'Conteudo da Historia de amor ',
            'subtitle'=>'Subtitulo da Historia de amor',
            'user_id'=>3,
            
        ]);
    }
}
