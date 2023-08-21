<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public static $tags = array("News", "Shorts", "Long", "Review", "Ranking", "Trailers", "Rant");
    public function definition()
    {
        return [
            'name' => array_pop(self::$tags),
        ];
    }
}
