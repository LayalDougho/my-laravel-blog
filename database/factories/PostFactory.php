<?php

namespace Database\Factories;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title= $this->faker->sentence(6);
        $body = $this->faker->paragraphs(3,true);
        return[
            'title'=>$title,
            'body'=>$body,
            'slug'=>Str::slug($title) .'-'. $this->faker->unique()->randomNumber(3),
            'user_id'=>User::factory(),
            'cover_image'=>null,
        ];
    }
}
