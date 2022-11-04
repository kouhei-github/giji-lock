<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    const LAST_SENTENCE = ["の今後について", "のタスク進捗について", "の部署異動について","の企画立案について"];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
//      タイトルの生成
        $name     =  $this->faker->name; // 1〜4つの単語で文章
        $lastName = explode(" ", $name)[0];
        $random   = random_int(0, 3);
        $title    = $lastName . self::LAST_SENTENCE[$random];

//      Contentの生成
        $content = $this->faker->realText(512);
        return [
            "title" => $title,
            "content" => $content
        ];
    }
}
