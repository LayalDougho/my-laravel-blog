<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userId= User::inRandomOrder()->first()->id;
        Post::factory(15)->create([
            'user_id'=>$userId,
        ]);


    //     Post::create([
    //         'title' => 'مقال تجريبي 1',
    //         'body'=> ' محتوى تجريبي 1محتوى تجريبي 1محتوى تجريبي 1محتوى تجريبي 1محتوى تجريبي 1محتوى تجريبي 1محتوى تجريبي 1',
    //         'slug'=> 'laravel-php-css',
    //     ]);

    //     Post::create([
    //         'title' => 'مقال تجريبي 1',
    //         'body'=> ' محتوى تجريبي 1محتوى تجريبي 1محتوى تجريبي 1محتوى تجريبي 1محتوى تجريبي 1محتوى تجريبي 1محتوى تجريبي 1',
    //         'slug'=> 'laravel-php-css1',
    //     ]);        
    //     Post::create([
    //         'title' => 'مقال تجريبي 1',
    //         'body'=> ' محتوى تجريبي 1محتوى تجريبي 1محتوى تجريبي 1محتوى تجريبي 1محتوى تجريبي 1محتوى تجريبي 1محتوى تجريبي 1',
    //         'slug'=> 'laravel-php-css2',
    //     ]);        
    //     Post::create([
    //         'title' => 'مقال تجريبي 1',
    //         'body'=> ' محتوى تجريبي 1محتوى تجريبي 1محتوى تجريبي 1محتوى تجريبي 1محتوى تجريبي 1محتوى تجريبي 1محتوى تجريبي 1',
    //         'slug'=> 'laravel-php-css3',
    //     ]);        
    //     Post::create([
    //         'title' => 'مقال تجريبي 1',
    //         'body'=> ' محتوى تجريبي 1محتوى تجريبي 1محتوى تجريبي 1محتوى تجريبي 1محتوى تجريبي 1محتوى تجريبي 1محتوى تجريبي 1',
    //         'slug'=> 'laravel-php-css4',
    //     ]);        
    //     Post::create([
    //         'title' => 'مقال تجريبي 1',
    //         'body'=> ' محتوى تجريبي 1محتوى تجريبي 1محتوى تجريبي 1محتوى تجريبي 1محتوى تجريبي 1محتوى تجريبي 1محتوى تجريبي 1',
    //         'slug'=> 'laravel-php-css5',
    //     ]);        
    //     Post::create([
    //         'title' => 'مقال تجريبي 1',
    //         'body'=> ' محتوى تجريبي 1محتوى تجريبي 1محتوى تجريبي 1محتوى تجريبي 1محتوى تجريبي 1محتوى تجريبي 1محتوى تجريبي 1',
    //         'slug'=> 'laravel-php-css6',
    //     ]);        
    //     Post::create([
    //         'title' => 'مقال تجريبي 1',
    //         'body'=> ' محتوى تجريبي 1محتوى تجريبي 1محتوى تجريبي 1محتوى تجريبي 1محتوى تجريبي 1محتوى تجريبي 1محتوى تجريبي 1',
    //         'slug'=> 'laravel-php-css7',
    //     ]);        
    //     Post::create([
    //         'title' => 'مقال تجريبي 1',
    //         'body'=> ' محتوى تجريبي 1محتوى تجريبي 1محتوى تجريبي 1محتوى تجريبي 1محتوى تجريبي 1محتوى تجريبي 1محتوى تجريبي 1',
    //         'slug'=> 'laravel-php-css8',
    //     ]);
    // }
}
}