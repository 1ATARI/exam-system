<?php

namespace Database\Factories;

use App\Models\Exam;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $correct =fake()->randomElement(['option_a' ,'option_b','option_c','option_d']);

        return [
            'name'=>fake()->name,
            'exam_id'=>Exam::factory(),
            'option_a'=>fake()->name,
            'option_b'=>fake()->name,
            'option_c'=>fake()->name,
            'option_d'=>fake()->name,
            'correct_answer'=>$correct,
        ];
    }
}
