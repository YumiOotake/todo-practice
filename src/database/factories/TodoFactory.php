<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Todo;
use App\Models\User;
use App\Models\Category;
use App\Models\Status;

class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Todo::class;
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id,
            'status_id' => Status::inRandomOrder()->first()->id,
            'title' => $this->faker->sentence(),
        ];//実行はまだ！
    }

}
