<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     * Title/Text post
     *
     * @return array<string, mixed>
     */
    // public function definition()
    // {
    //     return [
    //         "title" => $this->faker->words(10, true), //required
    //         "text" => $this->faker->paragraphs(2, true),
    //         "type" => "title"
    //     ];
    // }

    /**
     * Define the model's default state.
     * Image post
     *
     * @return array<string, mixed>
     */
    // public function definition()
    // {
    //     return [
    //         "title" => $this->faker->words(10, true), //required
    //         "text" => $this->faker->paragraphs(1, true),
    //         "image" => "sample-post-image-2.jpg",
    //         "type" => "photo"
    //     ];
    // }

    /**
     * Define the model's default state.
     * Link post
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "title" => $this->faker->words(10, true), //required
            "link" => "https://dev.to/madsstoumann/dark-mode-in-3-lines-of-css-and-other-adventures-1ljj",
            "type" => "link"
        ];
    }
}
