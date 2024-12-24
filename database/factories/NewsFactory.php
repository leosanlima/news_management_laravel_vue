<?php

namespace Database\Factories;

use App\Models\News;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    protected $model = News::class;

    public function definition(): array
    {
        $categoryIds = Category::pluck('id')->toArray();
        if (empty($categoryIds)) {
            $categoryIds = [Category::factory()->create()->id];
        }

        return [
            'title' => $this->generateNewsTitle(),
            'content' => $this->generateNewsContent(),
            'category_id' => $this->faker->randomElement($categoryIds),
            'created_at' => $this->faker->dateTimeBetween('-3 months', 'now'),
        ];
    }

    private function generateNewsTitle(): string
    {
        $formats = [
            'Última Hora: %s',
            'Mais Recentes: %s',
            'Atualização: %s',
            'Exclusivo: %s'
        ];

        $headline = $this->faker->sentence(rand(6, 12));
        return sprintf($this->faker->randomElement($formats), $headline);
    }

    private function generateNewsContent(): string
    {
        // Location and date for the first paragraph
        $city = $this->faker->city;
        $state = $this->faker->state;
        $date = $this->faker->date('F j, Y');

        // Generate 3-5 paragraphs
        $paragraphs = [];

        // First paragraph with location and date
        $paragraphs[] = "{$city}, {$state} - {$date} - " . $this->faker->paragraph();

        // Second paragraph with a quote
        $name = $this->faker->name;
        $title = $this->faker->jobTitle;
        $quote = $this->faker->sentence(rand(10, 20));
        $paragraphs[] = "\"{$quote}\" said {$name}, {$title}.";

        // Additional paragraphs
        for ($i = 0; $i < rand(2, 4); $i++) {
            $paragraphs[] = $this->faker->paragraph(rand(3, 6));
        }

        // Add a concluding quote
        $name = $this->faker->name;
        $organization = $this->faker->company;
        $quote = $this->faker->sentence(rand(8, 15));
        $paragraphs[] = "According to {$name} from {$organization}, \"{$quote}\"";

        return implode("\n\n", $paragraphs);
    }
}
