<?php

namespace Database\Factories;

use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name  = $this->faker->name;
        $email = $this->faker->unique()->safeEmail();
//      post_idのランダム取得
        $groups           = Group::all();
        $randomGroupIndex = random_int(0, count($groups)-1);
        $groupId          = $groups[$randomGroupIndex]->id;

//      group_idのランダム取得
        $posts           = Group::all();
        $randomPostIndex = random_int(0, count($posts)-1);
        $postId          = $posts[$randomPostIndex]->id;
        return [
            'name' => $name,
            'email' => $email,
            'email_verified_at' => now(),
            'password' => Hash::make("password"),
            'remember_token' => Str::random(10),
            'post_id' => $postId,
            'group_id' => $groupId,
            'roll' => random_int(1,2),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
