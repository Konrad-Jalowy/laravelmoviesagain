<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public static $roles = array("Admins", "Moderators", "Writers", "Users" );
    public function definition()
    {
        return [
            'name' => array_pop(self::$roles),
        ];
    }
}
